<?php
include 'koneksi.php';
include 'functions.php';

$nama = formatNama($_POST['nama']);
$email = $_POST['email'];
$jurusan = $_POST['jurusan'];

// validasi kosong
if (empty($nama) || empty($email)) {
    echo "Data tidak boleh kosong!";
    exit;
}

// validasi email
if (!validasiEmail($email)) {
    echo "Email tidak valid!";
    exit;
}

// simpan ke database
$query = "INSERT INTO mahasiswa (nama, email, jurusan)
VALUES ('$nama', '$email', '$jurusan')";

mysqli_query($conn, $query);

// redirect ke tampil
header("Location: tampil.php");
?>