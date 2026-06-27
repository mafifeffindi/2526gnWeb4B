CREATE DATABASE todo_db;

USE todo_db;

CREATE TABLE todo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tugas VARCHAR(255) NOT NULL,
    kategori VARCHAR(100) NOT NULL,
    status VARCHAR(50) NOT NULL,
    tanggal DATE NOT NULL
);
