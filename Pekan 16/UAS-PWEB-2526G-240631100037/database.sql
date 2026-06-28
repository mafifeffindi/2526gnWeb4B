CREATE DATABASE IF NOT EXISTS db_buku;

USE db_buku;

CREATE TABLE buku (

id INT AUTO_INCREMENT PRIMARY KEY,

judul VARCHAR(100),

penulis VARCHAR(100),

penerbit VARCHAR(100),

tahun YEAR

);