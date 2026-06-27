<?php
include 'koneksi.php';

$cari = "";

if(isset($_GET['cari'])){
    $cari = $_GET['cari'];

    $query = mysqli_query($koneksi,"SELECT * FROM mahasiswa
    WHERE
    nama LIKE '%$cari%'
    OR nim LIKE '%$cari%'
    ORDER BY id DESC");

}else{

    $query = mysqli_query($koneksi,"SELECT * FROM mahasiswa ORDER BY id DESC");

}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Daftar Mahasiswa</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark">

<div class="container">

<a class="navbar-brand" href="index.php">

<i class="bi bi-mortarboard-fill"></i>

Sistem Pendataan Mahasiswa

</a>

</div>

</nav>

<div class="container mt-5">

<div class="card">

<div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

<h4>

<i class="bi bi-table"></i>

Daftar Mahasiswa

</h4>

<a href="tambah.php" class="btn btn-success">

<i class="bi bi-plus-circle"></i>

Tambah Data

</a>

</div>

<div class="card-body">

<form method="GET">

<div class="input-group mb-4">

<input

type="text"

name="cari"

class="form-control"

placeholder="Cari Nama atau NIM..."

value="<?= $cari; ?>"

>

<button class="btn btn-primary">

<i class="bi bi-search"></i>

Cari

</button>

</div>

</form>

<div class="table-responsive">

<table class="table table-hover table-bordered">

<thead>

<tr>

<th>No</th>

<th>NIM</th>

<th>Nama</th>

<th>Program Studi</th>

<th>Semester</th>

<th>Email</th>

<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

while($data=mysqli_fetch_assoc($query)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $data['nim']; ?></td>

<td><?= $data['nama']; ?></td>

<td><?= $data['prodi']; ?></td>

<td>

<span class="badge bg-info">

Semester <?= $data['semester']; ?>

</span>

</td>

<td><?= $data['email']; ?></td>

<td>

<a href="edit.php?id=<?= $data['id']; ?>" class="btn btn-warning btn-sm">

<i class="bi bi-pencil-square"></i>

</a>

<a href="hapus.php?id=<?= $data['id']; ?>"

class="btn btn-danger btn-sm"

onclick="return confirm('Yakin ingin menghapus data ini?')">

<i class="bi bi-trash"></i>

</a>

</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

<a href="index.php" class="btn btn-secondary">

<i class="bi bi-arrow-left"></i>

Kembali

</a>

</div>

</div>

</div>

<footer>

<hr>

© 2026 Sistem Pendataan Mahasiswa

<br>

Dibuat oleh <b>Aanelong Nurhasanah</b>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>