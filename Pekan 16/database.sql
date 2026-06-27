-- =============================================
-- Sistem Pendataan Mahasiswa
-- UAS Pemrograman Web
-- Nama: Ahmad Dhani
-- NIM : 240631100050
-- =============================================

CREATE DATABASE IF NOT EXISTS db_mahasiswa;
USE db_mahasiswa;

CREATE TABLE IF NOT EXISTS mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(20) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    jurusan VARCHAR(100) NOT NULL,
    angkatan YEAR NOT NULL,
    jenis_kelamin ENUM('L', 'P') NOT NULL,
    email VARCHAR(100),
    no_hp VARCHAR(20),
    alamat TEXT,
    status ENUM('Aktif', 'Cuti', 'Lulus', 'DO') DEFAULT 'Aktif',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO mahasiswa (nim, nama, jurusan, angkatan, jenis_kelamin, email, no_hp, alamat, status) VALUES
('240631100050', 'Ahmad Dhani', 'Pendidikan Informatika', 2024, 'L', 'ahmad@utm.ac.id', '081234567890', 'Bangkalan, Madura', 'Aktif'),
('240631100051', 'Moh. Iqbal Daymumy', 'Pendidikan Informatika', 2024, 'L', 'iqbal@utm.ac.id', '081234567891', 'Sampang, Madura', 'Aktif'),
('240631100052', 'Muhammad Al-Rhosit', 'Pendidikan Informatika', 2024, 'L', 'alrhosit@utm.ac.id', '081234567892', 'Pamekasan, Madura', 'Aktif'),
('240631100053', 'Mohammad Hamzah Adi Putra', 'Pendidikan Informatika', 2024, 'L', 'hamzah@utm.ac.id', '081234567893', 'Sumenep, Madura', 'Aktif'),
('240631100054', 'Siti Rahmawati', 'Pendidikan Informatika', 2024, 'P', 'siti@utm.ac.id', '081234567894', 'Surabaya, Jawa Timur', 'Aktif');
