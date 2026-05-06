<?php
include "koneksi.php";
include "functions.php";

$nama = formatNama($_POST['nama']);
$email = $_POST['email'];
$jurusan = $_POST['jurusan'];

if (empty($nama) || empty($email) || empty($jurusan)) {
    echo "Data tidak boleh kosong!";
    exit;
}

if (!validasiEmail($email)) {
    echo "Email tidak valid!";
    exit;
}

$query = "INSERT INTO mahasiswa (nama, email, jurusan)
          VALUES ('$nama', '$email', '$jurusan')";

if (mysqli_query($conn, $query)) {
    header("Location: tampil.php");
} else {
    echo "Gagal menyimpan data";
}
?>