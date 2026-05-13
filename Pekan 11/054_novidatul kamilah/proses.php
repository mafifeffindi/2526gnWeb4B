<?php
include "koneksi.php";
include "functions.php";

$nama = formatNama($_POST['nama']);
$email = $_POST['email'];
$jurusan = $_POST['jurusan'];

// validasi
if (!$nama || !$email || !$jurusan) {
    echo "Semua field harus diisi!";
    exit;
}

if (!validasiEmail($email)) {
    echo "Email tidak valid!";
    exit;
}

// simpan ke database
$query = "INSERT INTO mahasiswa (nama, email, jurusan)
          VALUES ('$nama', '$email', '$jurusan')";

if (mysqli_query($conn, $query)) {
    echo "Data berhasil disimpan! <br>";
    echo "<a href='tampil.php'>Lihat Data</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>