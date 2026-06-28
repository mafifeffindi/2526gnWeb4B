-- Membuat Database
CREATE DATABASE db_mahasiswa;

-- Menggunakan Database
USE db_mahasiswa;

-- Membuat Tabel Mahasiswa
CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    prodi VARCHAR(100) NOT NULL,
    semester INT NOT NULL,
    email VARCHAR(100) NOT NULL
);

-- Data Awal
INSERT INTO mahasiswa (nim, nama, prodi, semester, email) VALUES
('230411100001','Ahmad Fauzi','Teknik Informatika',4,'ahmad@gmail.com'),
('230411100002','Siti Nurhaliza','Sistem Informasi',2,'siti@gmail.com'),
('230411100003','Budi Santoso','Teknik Informatika',6,'budi@gmail.com'),
('230411100004','Rina Amelia','Teknik Komputer',4,'rina@gmail.com'),
('230411100005','Dewi Lestari','Sistem Informasi',8,'dewi@gmail.com');