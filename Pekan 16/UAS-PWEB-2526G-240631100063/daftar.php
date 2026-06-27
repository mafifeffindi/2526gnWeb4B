<?php
include 'functions.php';
$data = tampil();
?>

<!DOCTYPE html>
<html>
<head>
<title>Daftar Buku</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
    <div class="logo">📚 Sistem Buku</div>
</div>

<div class="container">
    <div class="card">

        <div class="top-section">
            <h2>Daftar Buku</h2>
            <a href="tambah.php" class="btn btn-blue">+ Tambah</a>
        </div>

        <table>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>

            <?php $no=1; foreach($data as $row): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['judul']; ?></td>
                <td><?= $row['penulis']; ?></td>
                <td><?= $row['penerbit']; ?></td>
                <td><?= $row['tahun_terbit']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-orange">Edit</a>
                    <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-red">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

    </div>
</div>

</body>
</html>
