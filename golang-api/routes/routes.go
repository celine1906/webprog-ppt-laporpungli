package routes

import (
	"golang-api/controllers"

	"github.com/gorilla/mux"
)

func RegisterAduanRoutes(router *mux.Router) {
	router.HandleFunc("/aduan", controllers.CreateAduan).Methods("POST")
	router.HandleFunc("/aduan/{id}", controllers.UpdateAduanStatus).Methods("POST")
}
