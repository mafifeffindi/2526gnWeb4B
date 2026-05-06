<?php
include "koneksi.php";
include "functions.php";

$id = $_POST['id'];
$nama = formatNama($_POST['nama']);
$email = $_POST['email'];
$jurusan = $_POST['jurusan'];

mysqli_query($conn, "UPDATE mahasiswa SET 
    nama='$nama',
    email='$email',
    jurusan='$jurusan'
    WHERE id=$id
");

header("Location: tampil.php");
?>