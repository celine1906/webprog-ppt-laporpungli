package database

import (
	"fmt"
	"log"

	"gorm.io/driver/mysql"
	"gorm.io/gorm"
)

var DB *gorm.DB

func Connect() {
	dsn := "your-username:your-password@tcp(127.0.0.1:3306)/lapor-pungli?charset=utf8mb4&parseTime=True&loc=Local"
	database, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})
	if err != nil {
		log.Fatalln("Failed to connect to database: ", err)
	}

	// database.AutoMigrate(&models.Aduan{})
	DB = database
	fmt.Println("Database connection successful.")
}
