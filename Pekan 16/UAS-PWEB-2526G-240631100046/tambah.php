<?php
include "config/koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Tambah Data Mahasiswa</h1>

<hr>

<a href="index.php">Home</a> |
<a href="tambah.php">Tambah Data</a> |
<a href="daftar.php">Daftar Mahasiswa</a>

<hr>

<form action="proses/simpan.php" method="POST">

    <p>
        NIM <br>
        <input type="text" name="nim" required>
    </p>

    <p>
        Nama <br>
        <input type="text" name="nama" required>
    </p>

    <p>
        Jurusan <br>
        <input type="text" name="jurusan" required>
    </p>

    <p>
        Angkatan <br>
        <input type="number" name="angkatan" required>
    </p>

    <button type="submit">Simpan</button>

</form>

</body>
</html>