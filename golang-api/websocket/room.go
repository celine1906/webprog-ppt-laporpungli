// golang-api/websocket/room.go
package websocket

import (
    "log"
    "net/http"

    // "github.com/gorilla/websocket"
)

type Room struct {
    clients map[*Client]bool
    forward chan []byte
}

func NewRoom() *Room {
    return &Room{
        forward: make(chan []byte),
        clients: make(map[*Client]bool),
    }
}

func (r *Room) Run() {
    for {
        select {
        case msg := <-r.forward:
            for client := range r.clients {
                select {
                case client.receive <- msg:
                default:
                    close(client.receive)
                    delete(r.clients, client)
                }
            }
        }
    }
}

const (
    socketBufferSize  = 1024
    messageBufferSize = 256
)

// var upgrader = &websocket.Upgrader{ReadBufferSize: socketBufferSize, WriteBufferSize: socketBufferSize}

func (r *Room) ServeHTTP(w http.ResponseWriter, req *http.Request) {
    conn, err := upgrader.Upgrade(w, req, nil)
    if err != nil {
        log.Fatal("ServeHTTP:", err)
        return
    }
    client := NewClient(nil, conn, r)
    r.clients[client] = true
    go client.write()
    client.read()
}

