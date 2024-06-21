package models

import (
	"time"
)

type Aduan struct {
	ID              uint      `json:"id_aduan" gorm:"primaryKey"`
	UserID          uint      `json:"id_user"`
	AlamatKejadian  string    `json:"alamat_kejadian"`
	TanggalKejadian time.Time `json:"tanggal_kejadian"`
	Judul           string    `json:"judul"`
	Pesan           string    `json:"pesan"`
	BuktiKejadian   string    `json:"bukti_kejadian"`
	VideoKejadian   string    `json:"video_kejadian"`
	Status          string    `json:"status"`
	Komentar        string    `json:"komentar"`
	BuktiSolved     string    `json:"bukti_solved"`
	CreatedAt       time.Time `json:"created_at"`
	UpdatedAt       time.Time `json:"updated_at"`
}

func (Aduan) TableName() string {
	return "aduan"
}
