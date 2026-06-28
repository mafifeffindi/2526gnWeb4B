<?php
// ============================================
// FILE: update.php
// Fungsi: Proses POST - Update data mahasiswa
// ============================================
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id            = (int)$_POST['id'];
    $nim           = bersihkan($_POST['nim']);
    $nama          = bersihkan($_POST['nama']);
    $prodi         = bersihkan($_POST['prodi']);
    $angkatan      = bersihkan($_POST['angkatan']);
    $jenis_kelamin = bersihkan($_POST['jenis_kelamin']);
    $email         = bersihkan($_POST['email']);
    $no_hp         = bersihkan($_POST['no_hp']);

    // Cek NIM duplikat (kecuali milik sendiri)
    $cek = mysqli_query($koneksi, "SELECT id FROM mahasiswa WHERE nim='$nim' AND id != $id");
    if (mysqli_num_rows($cek) > 0) {
        header("Location: edit.php?id=$id&status=nim_duplikat");
        exit;
    }

    $sql = "UPDATE mahasiswa SET
                nim='$nim',
                nama='$nama',
                prodi='$prodi',
                angkatan='$angkatan',
                jenis_kelamin='$jenis_kelamin',
                email='$email',
                no_hp='$no_hp'
            WHERE id=$id";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: daftar.php?status=edit_berhasil");
    } else {
        header("Location: edit.php?id=$id&status=gagal");
    }
    exit;

} else {
    header("Location: daftar.php");
    exit;
}
?>
