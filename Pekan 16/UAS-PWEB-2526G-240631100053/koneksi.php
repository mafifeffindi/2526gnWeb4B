<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "crud_mahasiswa";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// FUNGSI 1: Membersihkan input data (Security / Form Processing)
function bersihkanInput($data) {
    global $koneksi;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return mysqli_real_escape_string($koneksi, $data);
}

// FUNGSI 2: Memformat teks Jurusan agar seragam
function formatJurusan($jurusan) {
    return ucwords(strtolower($jurusan));
}
?>