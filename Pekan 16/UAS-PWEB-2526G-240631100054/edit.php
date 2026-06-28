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

    <title>Edit Mahasiswa</title>

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

<div class="card-header bg-warning">

<h4>Edit Data Mahasiswa</h4>

</div>

<div class="card-body">

<form action="proses_edit.php" method="POST">

<input type="hidden" name="id" value="<?= $data['id']; ?>">

<div class="mb-3">

<label>NIM</label>

<input type="text" name="nim" class="form-control"
value="<?= $data['nim']; ?>" required>

</div>

<div class="mb-3">

<label>Nama Mahasiswa</label>

<input type="text" name="nama" class="form-control"
value="<?= $data['nama']; ?>" required>

</div>

<div class="mb-3">

<label>Program Studi</label>

<input type="text" name="prodi" class="form-control"
value="<?= $data['prodi']; ?>" required>

</div>

<div class="mb-3">

<label>Semester</label>

<input type="number" name="semester" class="form-control"
value="<?= $data['semester']; ?>" required>

</div>

<div class="mb-3">

<label>Email</label>

<input type="email" name="email" class="form-control"
value="<?= $data['email']; ?>" required>

</div>

<button type="submit" class="btn btn-warning">

Update Data

</button>

<a href="daftar.php" class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

</body>

</html>