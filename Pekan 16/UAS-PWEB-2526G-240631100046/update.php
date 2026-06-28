<?php

include "../config/koneksi.php";

$id = $_POST['id'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$angkatan = $_POST['angkatan'];

$query = mysqli_query($koneksi, "UPDATE mahasiswa SET

NIM='$nim',
Nama='$nama',
Jurusan='$jurusan',
Angkatan='$angkatan'

WHERE Id='$id'");

if($query){

header("Location: ../daftar.php");

}else{

echo "Update gagal";

}

?>