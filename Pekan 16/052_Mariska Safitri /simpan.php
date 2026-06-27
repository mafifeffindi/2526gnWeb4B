<?php

include 'koneksi.php';

$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$kategori = $_POST['kategori'];
$jumlah = $_POST['jumlah'];
$kondisi = $_POST['kondisi'];
$lokasi = $_POST['lokasi'];

mysqli_query($conn, "INSERT INTO barang
(kode_barang, nama_barang, kategori, jumlah, kondisi, lokasi)
VALUES
('$kode_barang','$nama_barang','$kategori','$jumlah','$kondisi','$lokasi')");

header("Location: daftar.php");

?>
