<?php
// Mengaktifkan session secara global di semua file yang menyertakan koneksi.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_kampus"; // Disesuaikan dengan db_kampus pada file koneksi Anda

$conn = mysqli_connect($host, $user, $pass, $db);

// Dual assignment untuk mendukung file yang menggunakan $conn maupun $koneksi
$koneksi = $conn;

if (!$koneksi) {
    die("Koneksi ke basis data gagal: " . mysqli_connect_error());
}
?>