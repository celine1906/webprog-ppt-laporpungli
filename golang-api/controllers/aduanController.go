package controllers

import (
	"encoding/json"
	"golang-api/database"
	"golang-api/models"
	"io"
	"log"
	"net/http"
	"os"
	"path/filepath"
	"strconv"
	"time"

	"github.com/gorilla/mux"
)

func CreateAduan(w http.ResponseWriter, r *http.Request) {
	var aduan models.Aduan

	// Parse form data
	if err := r.ParseMultipartForm(10 << 20); err != nil {
		log.Println("Unable to parse form: ", err)
		http.Error(w, "Unable to parse form", http.StatusBadRequest)
		return
	}

	// Get form values
	userID, err := strconv.ParseUint(r.FormValue("id_user"), 10, 64)
	if err != nil {
		log.Println("Invalid user ID: ", err)
		http.Error(w, "Invalid user ID", http.StatusBadRequest)
		return
	}
	aduan.UserID = uint(userID)
	aduan.AlamatKejadian = r.FormValue("alamat_kejadian")
	aduan.TanggalKejadian, err = time.Parse("2006-01-02", r.FormValue("tanggal_kejadian"))
	if err != nil {
		log.Println("Invalid date format: ", err)
		http.Error(w, "Invalid date format", http.StatusBadRequest)
		return
	}
	aduan.Pesan = r.FormValue("pesan")

	// Handle file upload
	file, header, err := r.FormFile("bukti_kejadian")
	if err != nil {
		log.Println("File is required: ", err)
		http.Error(w, "File is required", http.StatusBadRequest)
		return
	}
	defer file.Close()

	// Ensure the uploads directory exists
	uploadDir := "uploads/bukti_kejadian"
	if _, err := os.Stat(uploadDir); os.IsNotExist(err) {
		if err := os.MkdirAll(uploadDir, os.ModePerm); err != nil {
			log.Println("Could not create uploads directory: ", err)
			http.Error(w, "Could not create uploads directory", http.StatusInternalServerError)
			return
		}
	}

	// Create a file within the uploads directory
	tempFile, err := os.Create(filepath.Join(uploadDir, header.Filename))
	if err != nil {
		log.Println("Could not create file: ", err)
		http.Error(w, "Could not create file", http.StatusInternalServerError)
		return
	}
	defer tempFile.Close()

	// Read the contents of the uploaded file into a byte array
	fileBytes, err := io.ReadAll(file)
	if err != nil {
		log.Println("Could not read file: ", err)
		http.Error(w, "Could not read file", http.StatusInternalServerError)
		return
	}

	// Write the contents of the file to the temporary file
	if _, err := tempFile.Write(fileBytes); err != nil {
		log.Println("Could not write file: ", err)
		http.Error(w, "Could not write file", http.StatusInternalServerError)
		return
	}

	// Save the filename to the database
	aduan.BuktiKejadian = "uploads/bukti_kejadian/" + header.Filename
	aduan.Status = "pending"
	// Save to database
	if err := database.DB.Create(&aduan).Error; err != nil {
		log.Println("Database error: ", err)
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	log.Println("Aduan created successfully: ", aduan)
	w.WriteHeader(http.StatusOK)
	json.NewEncoder(w).Encode(aduan)
}

func UpdateAduanStatus(w http.ResponseWriter, r *http.Request) {
	params := mux.Vars(r)
	id, _ := strconv.Atoi(params["id"])
	var aduan models.Aduan

	if err := database.DB.First(&aduan, id).Error; err != nil {
		http.Error(w, "Aduan not found", http.StatusNotFound)
		return
	}

	aduan.Status = r.FormValue("status")
	aduan.Komentar = r.FormValue("komentar")

	file, handler, err := r.FormFile("bukti_solved")
	if err == nil {
		defer file.Close()
		filePath := filepath.Join("uploads", handler.Filename)
		f, err := os.OpenFile(filePath, os.O_WRONLY|os.O_CREATE, 0666)
		if err == nil {
			defer f.Close()
			io.Copy(f, file)
			aduan.BuktiSolved = filePath
		}
	}

	database.DB.Save(&aduan)

	json.NewEncoder(w).Encode(aduan)
}
