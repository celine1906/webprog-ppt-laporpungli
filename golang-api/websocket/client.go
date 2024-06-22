package websocket

import (
    "github.com/gorilla/websocket"
)

// Client represents a single chatting user.
type Client struct {
    hub    *Hub
    conn   *websocket.Conn
    send   chan *Message
    room   *Room
    receive chan []byte
}

// NewClient creates a new Client instance.
func NewClient(hub *Hub, conn *websocket.Conn, room *Room) *Client {
    return &Client{
        hub:    hub,
        conn:   conn,
        send:   make(chan *Message),
        room:   room,
        receive: make(chan []byte),
    }
}

// readPump reads messages from the WebSocket connection.
func (c *Client) readPump() {
    defer func() {
        c.hub.unregister <- c
        c.conn.Close()
    }()
    for {
        var msg Message
        err := c.conn.ReadJSON(&msg)
        if err != nil {
            return
        }
        c.hub.broadcast <- &msg
    }
}

// writePump writes messages to the WebSocket connection.
func (c *Client) writePump() {
    defer func() {
        c.conn.Close()
    }()
    for {
        msg, ok := <-c.send
        if !ok {
            c.conn.WriteMessage(websocket.CloseMessage, []byte{})
            return
        }
        c.conn.WriteJSON(msg)
    }
}

// read reads messages from the WebSocket connection and forwards them to the room.
func (c *Client) read() {
    defer c.conn.Close()
    for {
        _, msg, err := c.conn.ReadMessage()
        if err != nil {
            return
        }
        c.room.forward <- msg
    }
}

// write writes messages from the receive channel to the WebSocket connection.
func (c *Client) write() {
    defer c.conn.Close()
    for msg := range c.receive {
        err := c.conn.WriteMessage(websocket.TextMessage, msg)
        if err != nil {
            return
        }
    }
}
