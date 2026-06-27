<?php

include 'koneksi.php';

$id = $_POST['id'];
$tugas = $_POST['tugas'];
$kategori = $_POST['kategori'];
$status = $_POST['status'];
$tanggal = $_POST['tanggal'];

mysqli_query($conn,"
UPDATE todo
SET
tugas='$tugas',
kategori='$kategori',
status='$status',
tanggal='$tanggal'
WHERE id='$id'
");

header("Location: daftar.php");

?>
