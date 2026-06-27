<?php
require 'koneksi.php';

// Validasi ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: daftar.php');
    exit;
}

$id = (int) $_GET['id'];

// Cek data ada
$cek = mysqli_query($koneksi, "SELECT id FROM mahasiswa WHERE id = $id");
if (mysqli_num_rows($cek) === 0) {
    header('Location: daftar.php');
    exit;
}

// Eksekusi hapus
$hapus = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");

if ($hapus) {
    header('Location: daftar.php?msg=hapus_ok');
} else {
    header('Location: daftar.php?msg=hapus_gagal');
}
exit;
?>
