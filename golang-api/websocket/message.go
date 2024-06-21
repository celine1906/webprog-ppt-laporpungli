// golang-api/websocket/message.go
package websocket

// Message represents a message sent by a client.
type Message struct {
    SenderID   uint   `json:"sender_id"`
    ReceiverID uint   `json:"receiver_id"`
    Content    string `json:"content"`
    Type       string `json:"type"`
}
