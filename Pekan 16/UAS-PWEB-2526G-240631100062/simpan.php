<?php

include 'koneksi.php';

$tugas = $_POST['tugas'];
$kategori = $_POST['kategori'];
$status = $_POST['status'];
$tanggal = $_POST['tanggal'];

mysqli_query($conn,"
INSERT INTO todo
(tugas,kategori,status,tanggal)
VALUES
('$tugas','$kategori','$status','$tanggal')
");

header("Location: daftar.php");

?>
