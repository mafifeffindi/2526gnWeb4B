<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

<div class="container">

<a class="navbar-brand" href="index.php">

Sistem Pendataan Mahasiswa

</a>

</div>

</nav>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h4>Tambah Data Mahasiswa</h4>

</div>

<div class="card-body">

<form action="proses_tambah.php" method="POST">

<div class="mb-3">

<label>NIM</label>

<input type="text" name="nim" class="form-control" required>

</div>

<div class="mb-3">

<label>Nama Mahasiswa</label>

<input type="text" name="nama" class="form-control" required>

</div>

<div class="mb-3">

<label>Program Studi</label>

<input type="text" name="prodi" class="form-control" required>

</div>

<div class="mb-3">

<label>Semester</label>

<input type="number" name="semester" class="form-control" required>

</div>

<div class="mb-3">

<label>Email</label>

<input type="email" name="email" class="form-control" required>

</div>

<button type="submit" class="btn btn-success">

Simpan

</button>

<a href="index.php" class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

</body>

</html>