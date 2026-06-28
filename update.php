<?php
include "config/koneksi.php";

$id=$_POST['id'];
$nim=$_POST['nim'];
$nama=$_POST['nama'];
$jurusan=$_POST['jurusan'];
$angkatan=$_POST['angkatan'];

mysqli_query($conn,"UPDATE mahasiswa SET
nim='$nim',
nama='$nama',
jurusan='$jurusan',
angkatan='$angkatan'
WHERE id='$id'");

header("Location: daftar.php");
?>
