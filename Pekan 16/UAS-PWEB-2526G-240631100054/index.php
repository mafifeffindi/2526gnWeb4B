<?php

include 'koneksi.php';
include 'functions.php';

?>

<!DOCTYPE html>

<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Sistem Pendataan Mahasiswa</title>

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

<div class="card-body">

<h2>

<?php

echo salam();

?>

</h2>

<hr>

<p>

Aplikasi ini digunakan untuk mengelola data mahasiswa menggunakan PHP Native dan MySQL.

</p>

<h5>

Jumlah Mahasiswa :

<?php

echo jumlahMahasiswa($koneksi);

?>

</h5>

<br>

<a href="tambah.php" class="btn btn-success">

Tambah Data

</a>

<a href="daftar.php" class="btn btn-primary">

Daftar Mahasiswa

</a>

</div>

</div>

</div>

</body>

</html>