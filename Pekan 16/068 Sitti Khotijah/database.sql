-- Membuat Database
CREATE DATABASE IF NOT EXISTS db_buku;
USE db_buku;

-- Membuat Tabel Buku
CREATE TABLE buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(100) NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    penerbit VARCHAR(100) NOT NULL,
    tahun INT NOT NULL
);

-- Data Awal
INSERT INTO buku (judul, penulis, penerbit, tahun) VALUES
('Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', 2005),
('Bumi', 'Tere Liye', 'Gramedia', 2014),
('Negeri 5 Menara', 'Ahmad Fuadi', 'Gramedia', 2009),
('Dilan 1990', 'Pidi Baiq', 'Pastel Books', 2014),
('Ayat-Ayat Cinta', 'Habiburrahman El Shirazy', 'Republika', 2004);