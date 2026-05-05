<?php
include 'koneksi.php';
include 'functions.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$jurusan = $_POST['jurusan'];

// proses
$nama = formatNama($nama);

if (!validasiEmail($email)) {
    echo "Email tidak valid!";
    exit;
}

// simpan ke database
$query = "INSERT INTO mahasiswa (nama, email, jurusan)
          VALUES ('$nama', '$email', '$jurusan')";

if (mysqli_query($conn, $query)) {
    echo "Data berhasil disimpan!<br>";
    echo "<a href='index.php'>Kembali</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}
