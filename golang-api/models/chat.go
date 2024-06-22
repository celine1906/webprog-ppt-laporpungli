package models

import (
	"time"
)

type ChatMessage struct {
	ID         uint `gorm:"primary_key"`
	SenderID   uint
	ReceiverID uint
	Content    string
	Type       string // "text" or "image"
	CreatedAt  time.Time
}
