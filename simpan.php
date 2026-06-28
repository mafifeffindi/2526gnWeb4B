<?php
include "config/koneksi.php";

$nim=$_POST['nim'];
$nama=$_POST['nama'];
$jurusan=$_POST['jurusan'];
$angkatan=$_POST['angkatan'];

mysqli_query($conn,"INSERT INTO mahasiswa
VALUES(NULL,'$nim','$nama','$jurusan','$angkatan')");

header("Location: daftar.php");
?>
