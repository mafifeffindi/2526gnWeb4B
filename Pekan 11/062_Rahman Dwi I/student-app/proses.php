<?php
include 'koneksi.php';
include 'functions.php';

$nama = formatNama($_POST['nama']);
$email = $_POST['email'];
$jurusan = $_POST['jurusan'];

// Validasi email
if (!validasiEmail($email)) {
    echo "Email tidak valid!";
    exit;
}

// Simpan ke database
$query = "INSERT INTO mahasiswa (nama, email, jurusan) VALUES ('$nama', '$email', '$jurusan')";

if (mysqli_query($conn, $query)) {
    echo "Data berhasil disimpan!<br>";
    echo "<a href='tampil.php'>Lihat Data</a>";
} else {
    echo "Gagal: " . mysqli_error($conn);
}
?>
