<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nim   = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $prodi = mysqli_real_escape_string($koneksi, $_POST['prodi']);

    mysqli_query($koneksi, "INSERT INTO mahasiswa VALUES ('', '$nim', '$nama', '$prodi')");
    header("location:index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Tambah Data Mahasiswa</h2>
    <form method="post">
        <div class="form-group">
            <label>NIM</label>
            <input type="text" name="nim" placeholder="Masukkan NIM" required>
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Masukkan Nama" required>
        </div>
        <div class="form-group">
            <label>Prodi</label>
            <input type="text" name="prodi" placeholder="Masukkan Prodi" required>
        </div>
        <button type="submit" name="simpan">Simpan</button>
    </form>
    <a href="index.php" class="btn-back">← Kembali ke Daftar</a>
</div>
</body>
</html>
