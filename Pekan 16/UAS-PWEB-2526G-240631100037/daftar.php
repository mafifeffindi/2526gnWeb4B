<?php
include 'fungsi.php';

$buku = tampil();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container mt-5">

<h2 class="text-center mb-4">📚 Daftar Buku</h2>

<a href="tambah.php" class="btn btn-success mb-3">+ Tambah Buku</a>

<table class="table table-bordered table-striped shadow">

<tr class="table-success">
<th>No</th>
<th>Judul</th>
<th>Penulis</th>
<th>Penerbit</th>
<th>Tahun</th>
<th>Aksi</th>
</tr>

<?php
$no=1;
foreach($buku as $row):
?>

<tr>

<td><?= $no++; ?></td>

<td><?= $row['judul']; ?></td>

<td><?= $row['penulis']; ?></td>

<td><?= $row['penerbit']; ?></td>

<td><?= $row['tahun']; ?></td>

<td>

<a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>

<a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>

</td>

</tr>

<?php endforeach; ?>

</table>

<a href="index.php" class="btn btn-secondary">Kembali</a>

</div>

</body>
</html>