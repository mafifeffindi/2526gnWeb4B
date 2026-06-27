<?php
include 'koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Data Mahasiswa</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- CSS -->
<link rel="stylesheet" href="css/style.css">

</head>

<body>

<!-- Navbar -->

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

<div class="card-header bg-warning text-white">

<h4>

<i class="bi bi-pencil-square"></i>

Edit Data Mahasiswa

</h4>

</div>

<div class="card-body">

<form action="proses_edit.php" method="POST">

<input
type="hidden"
name="id"
value="<?= $data['id']; ?>">

<div class="row">

<div class="col-md-6 mb-3">

<label class="form-label">

NIM

</label>

<input
type="text"
name="nim"
class="form-control"
value="<?= $data['nim']; ?>"
required>

</div>

<div class="col-md-6 mb-3">

<label class="form-label">

Nama Mahasiswa

</label>

<input
type="text"
name="nama"
class="form-control"
value="<?= $data['nama']; ?>"
required>

</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label class="form-label">

Program Studi

</label>

<input
type="text"
name="prodi"
class="form-control"
value="<?= $data['prodi']; ?>"
required>

</div>

<div class="col-md-6 mb-3">

<label class="form-label">

Semester

</label>

<input
type="number"
name="semester"
class="form-control"
value="<?= $data['semester']; ?>"
required>

</div>

</div>

<div class="mb-4">

<label class="form-label">

Email

</label>

<input
type="email"
name="email"
class="form-control"
value="<?= $data['email']; ?>"
required>

</div>

<button type="submit" class="btn btn-warning text-white">

<i class="bi bi-save"></i>

Update Data

</button>

<a href="daftar.php" class="btn btn-secondary">

<i class="bi bi-arrow-left"></i>

Kembali

</a>

</form>

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