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
	if err := r.ParseMultipartForm(50 << 20); err != nil { // Increase limit if needed
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
	aduan.Judul = r.FormValue("judul")
	aduan.Pesan = r.FormValue("pesan")

	// Handle file upload for bukti kejadian
	buktiFile, buktiHeader, err := r.FormFile("bukti_kejadian")
	if err != nil {
		log.Println("Bukti kejadian file is required: ", err)
		http.Error(w, "Bukti kejadian file is required", http.StatusBadRequest)
		return
	}
	defer buktiFile.Close()

	// Handle file upload for video kejadian
	videoFile, videoHeader, err := r.FormFile("video_kejadian")
	if err != nil {
		log.Println("Video kejadian file is required: ", err)
		http.Error(w, "Video kejadian file is required", http.StatusBadRequest)
		return
	}
	defer videoFile.Close()

	// Ensure the uploads directory exists
	uploadDir := "uploads/bukti_kejadian"
	if _, err := os.Stat(uploadDir); os.IsNotExist(err) {
		if err := os.MkdirAll(uploadDir, os.ModePerm); err != nil {
			log.Println("Could not create uploads directory: ", err)
			http.Error(w, "Could not create uploads directory", http.StatusInternalServerError)
			return
		}
	}

	videoUploadDir := "uploads/video_kejadian"
	if _, err := os.Stat(videoUploadDir); os.IsNotExist(err) {
		if err := os.MkdirAll(videoUploadDir, os.ModePerm); err != nil {
			log.Println("Could not create video uploads directory: ", err)
			http.Error(w, "Could not create video uploads directory", http.StatusInternalServerError)
			return
		}
	}

	// Create a file within the uploads directory for bukti kejadian
	buktiTempFile, err := os.Create(filepath.Join(uploadDir, buktiHeader.Filename))
	if err != nil {
		log.Println("Could not create file: ", err)
		http.Error(w, "Could not create file", http.StatusInternalServerError)
		return
	}
	defer buktiTempFile.Close()

	// Create a file within the uploads directory for video kejadian
	videoTempFile, err := os.Create(filepath.Join(videoUploadDir, videoHeader.Filename))
	if err != nil {
		log.Println("Could not create video file: ", err)
		http.Error(w, "Could not create video file", http.StatusInternalServerError)
		return
	}
	defer videoTempFile.Close()

	// Read the contents of the uploaded bukti file into a byte array
	buktiFileBytes, err := io.ReadAll(buktiFile)
	if err != nil {
		log.Println("Could not read file: ", err)
		http.Error(w, "Could not read file", http.StatusInternalServerError)
		return
	}

	// Read the contents of the uploaded video file into a byte array
	videoFileBytes, err := io.ReadAll(videoFile)
	if err != nil {
		log.Println("Could not read video file: ", err)
		http.Error(w, "Could not read video file", http.StatusInternalServerError)
		return
	}

	// Write the contents of the bukti file to the temporary file
	if _, err := buktiTempFile.Write(buktiFileBytes); err != nil {
		log.Println("Could not write file: ", err)
		http.Error(w, "Could not write file", http.StatusInternalServerError)
		return
	}

	// Write the contents of the video file to the temporary file
	if _, err := videoTempFile.Write(videoFileBytes); err != nil {
		log.Println("Could not write video file: ", err)
		http.Error(w, "Could not write video file", http.StatusInternalServerError)
		return
	}

	// Save the filenames to the database
	aduan.BuktiKejadian = "uploads/bukti_kejadian/" + buktiHeader.Filename
	aduan.VideoKejadian = "uploads/video_kejadian/" + videoHeader.Filename
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
