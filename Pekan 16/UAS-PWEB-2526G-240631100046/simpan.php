<?php

include "../config/koneksi.php";

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$angkatan = $_POST['angkatan'];

$query = mysqli_query($koneksi, "INSERT INTO mahasiswa(nim,nama,jurusan,angkatan)
VALUES('$nim','$nama','$jurusan','$angkatan')");

if($query){

    header("Location: ../daftar.php");

}else{

    echo "Data gagal disimpan";

}

?>