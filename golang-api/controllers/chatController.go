package controllers

import (
    "net/http"
    "golang-api/websocket"
    "gorm.io/gorm"
    "golang-api/models"
)

type ChatController struct {
    DB *gorm.DB
}

func (c *ChatController) ServeWs(hub *websocket.Hub, w http.ResponseWriter, r *http.Request) {
    websocket.ServeWs(hub, w, r)
}

func (c *ChatController) SaveMessage(db *gorm.DB, msg *websocket.Message) error {
    chatMessage := models.ChatMessage{
        SenderID:   msg.SenderID,
        ReceiverID: msg.ReceiverID,
        Content:    msg.Content,
        Type:       msg.Type,
    }
    return db.Create(&chatMessage).Error
}
