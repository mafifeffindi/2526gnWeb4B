<?php
include 'functions.php';

if(isset($_POST['simpan'])){
    tambah($_POST);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Buku</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
    <div class="logo">📚 Sistem Buku</div>
</div>

<div class="container">
    <div class="card">
        <h2>Tambah Data Buku</h2>

        <form method="post">
            <input type="text" name="judul" placeholder="Judul Buku" required>
            <input type="text" name="penulis" placeholder="Penulis" required>
            <input type="text" name="penerbit" placeholder="Penerbit" required>
            <input type="number" name="tahun_terbit" placeholder="Tahun Terbit" required>

            <button class="btn btn-green" name="simpan">Simpan</button>
            <a href="index.php" class="btn btn-gray">Kembali</a>
        </form>
    </div>
</div>

</body>
</html>
