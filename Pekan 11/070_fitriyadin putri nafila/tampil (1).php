<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h2>Data Mahasiswa Terdaftar</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr bgcolor="#eee">
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>L/P</th>
        </tr>
        <?php $i = 1; foreach ($mahasiswa as $row) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
            <td><?= $row["alamat"]; ?></td>
            <td><?= $row["jenis_kelamin"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="index.php">Tambah Data Lagi</a>
</body>
</html>