<?php

include 'koneksi.php';

$id = $_POST['id'];
$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$kategori = $_POST['kategori'];
$jumlah = $_POST['jumlah'];
$kondisi = $_POST['kondisi'];
$lokasi = $_POST['lokasi'];

mysqli_query($conn, "UPDATE barang SET

kode_barang='$kode_barang',
nama_barang='$nama_barang',
kategori='$kategori',
jumlah='$jumlah',
kondisi='$kondisi',
lokasi='$lokasi'

WHERE id='$id'
");

header("Location: daftar.php");

?>
