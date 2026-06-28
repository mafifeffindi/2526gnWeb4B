<?php
// ============================================
// FILE: hapus.php
// Fungsi: Hapus data mahasiswa berdasarkan ID
// ============================================
require 'koneksi.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Cek data ada
    $cek = mysqli_query($koneksi, "SELECT id FROM mahasiswa WHERE id=$id");
    if (mysqli_num_rows($cek) == 0) {
        header("Location: daftar.php");
        exit;
    }

    $sql = "DELETE FROM mahasiswa WHERE id=$id";
    if (mysqli_query($koneksi, $sql)) {
        header("Location: daftar.php?status=hapus_berhasil");
    } else {
        header("Location: daftar.php?status=gagal");
    }
} else {
    header("Location: daftar.php");
}
exit;
?>
