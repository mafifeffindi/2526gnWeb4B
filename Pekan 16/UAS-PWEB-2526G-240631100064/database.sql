-- ============================================
-- DATABASE: Sistem Pendataan Mahasiswa
-- UAS Pemrograman Web
-- ============================================

CREATE DATABASE IF NOT EXISTS db_mahasiswa;
USE db_mahasiswa;

CREATE TABLE IF NOT EXISTS mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(20) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    prodi VARCHAR(100) NOT NULL,
    angkatan YEAR NOT NULL,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,
    email VARCHAR(100),
    no_hp VARCHAR(15),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Data awal (minimal 5 record)
INSERT INTO mahasiswa (nim, nama, prodi, angkatan, jenis_kelamin, email, no_hp) VALUES
('240631100001', 'Ahmad Fauzi', 'Pendidikan Informatika', 2024, 'Laki-laki', 'ahmad@email.com', '081234567890'),
('240631100002', 'Siti Rahayu', 'Pendidikan Informatika', 2024, 'Perempuan', 'siti@email.com', '081234567891'),
('240631100003', 'Budi Santoso', 'Pendidikan Informatika', 2024, 'Laki-laki', 'budi@email.com', '081234567892'),
('240631100004', 'Dewi Lestari', 'Pendidikan Informatika', 2024, 'Perempuan', 'dewi@email.com', '081234567893'),
('240631100064', 'Hamzah', 'Pendidikan Informatika', 2024, 'Laki-laki', 'hamzah@email.com', '081234567894');
