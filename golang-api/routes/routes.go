package routes

import (
	"golang-api/controllers"
	"golang-api/websocket"
	"net/http"

	"github.com/gorilla/mux"
)

func RegisterAduanRoutes(router *mux.Router) {
	router.HandleFunc("/aduan", controllers.CreateAduan).Methods("POST")
	router.HandleFunc("/aduan/{id}", controllers.UpdateAduanStatus).Methods("POST")
}

func RegisterWebSocketRoute(router *mux.Router, hub *websocket.Hub) {
	router.HandleFunc("/ws", func(w http.ResponseWriter, r *http.Request) {
		websocket.ServeWs(hub, w, r)
	})
}
