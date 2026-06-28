<?php
// ============================================
// FILE: simpan.php
// Fungsi: Proses POST - Tambah data mahasiswa
// ============================================
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Ambil dan bersihkan data dari form
    $nim           = bersihkan($_POST['nim']);
    $nama          = bersihkan($_POST['nama']);
    $prodi         = bersihkan($_POST['prodi']);
    $angkatan      = bersihkan($_POST['angkatan']);
    $jenis_kelamin = bersihkan($_POST['jenis_kelamin']);
    $email         = bersihkan($_POST['email']);
    $no_hp         = bersihkan($_POST['no_hp']);

    // Cek NIM sudah ada atau belum
    $cek = mysqli_query($koneksi, "SELECT id FROM mahasiswa WHERE nim='$nim'");
    if (mysqli_num_rows($cek) > 0) {
        header("Location: tambah.php?status=nim_duplikat");
        exit;
    }

    // Query INSERT
    $sql = "INSERT INTO mahasiswa (nim, nama, prodi, angkatan, jenis_kelamin, email, no_hp)
            VALUES ('$nim', '$nama', '$prodi', '$angkatan', '$jenis_kelamin', '$email', '$no_hp')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: tambah.php?status=berhasil");
    } else {
        header("Location: tambah.php?status=gagal");
    }
    exit;

} else {
    header("Location: tambah.php");
    exit;
}
?>
