package main

import (
	"golang-api/database"
	"golang-api/routes"
	"log"
	"net/http"

	"github.com/gorilla/mux"
)

func main() {
	// Connect to the database
	database.Connect()

	// Auto migrate the Aduan model
	// database.DB.AutoMigrate(&models.Aduan{})

	// Set up the router
	router := mux.NewRouter()
	routes.RegisterAduanRoutes(router)

	// Start the server
	log.Println("Server started at :8080")
	log.Fatal(http.ListenAndServe(":8080", router))
}
