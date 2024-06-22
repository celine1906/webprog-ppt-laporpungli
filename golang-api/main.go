// golang-api/main.go
package main

import (
    "flag"
    "golang-api/database"
    "golang-api/routes"
    "golang-api/websocket"
    "log"
    "net/http"
    "path/filepath"
    "sync"
    "text/template"

    "github.com/gorilla/mux"
)

// templ represents a single template
type templateHandler struct {
    once     sync.Once
    filename string
    templ    *template.Template
}

// ServeHTTP handles the HTTP request.
func (t *templateHandler) ServeHTTP(w http.ResponseWriter, r *http.Request) {
    t.once.Do(func() {
        t.templ = template.Must(template.ParseFiles(filepath.Join("templates", t.filename)))
    })
    t.templ.Execute(w, r)
}

func main() {
    // Connect to the database
    database.Connect()

    var addr = flag.String("addr", ":8080", "The addr of the application.")
    flag.Parse() // parse the flags

    hub := websocket.NewHub()
    room := websocket.NewRoom()

    go hub.Run()
    go room.Run()

    // Set up the router
    router := mux.NewRouter()
    routes.RegisterAduanRoutes(router)

    // Register the WebSocket endpoint
    router.Handle("/room", room)

    http.Handle("/", &templateHandler{filename: "chat.html"})
    http.Handle("/room", room)

    // Start the server
    log.Println("Server started at", *addr)
    if err := http.ListenAndServe(*addr, router); err != nil {
        log.Fatal("ListenAndServe:", err)
    }
}
