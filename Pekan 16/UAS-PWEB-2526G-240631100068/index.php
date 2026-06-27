<?php
include "function.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendataan Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg">

<div class="container">

<a class="navbar-brand" href="#">
<i class="fa-solid fa-book-open"></i>
Sistem Pendataan Buku
</a>

<button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="index.php">
<i class="fa fa-house"></i> Home
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="daftar.php">
<i class="fa fa-book"></i> Daftar Buku
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="tambah.php">
<i class="fa fa-plus-circle"></i> Tambah Buku
</a>
</li>

</ul>

</div>

</div>

</nav>

<!-- Hero -->

<div class="container">

<div class="hero">

<div class="row align-items-center">

<div class="col-md-7">

<h1>Sistem Pendataan Buku</h1>

<p>

<?= salam(); ?>

</p>

<p>

Aplikasi ini dibuat untuk memenuhi tugas
Ujian Akhir Semester Mata Kuliah
Pemrograman Web menggunakan
HTML, CSS, PHP Native dan MySQL.

</p>

<a href="daftar.php" class="btn btn-light btn-custom">

<i class="fa fa-book"></i>

Lihat Data Buku

</a>

<a href="tambah.php" class="btn btn-warning btn-custom">

<i class="fa fa-plus"></i>

Tambah Buku

</a>

</div>

<div class="col-md-5 text-center">

<img src="https://cdn-icons-png.flaticon.com/512/2436/2436636.png"
class="img-fluid"
width="300">

</div>

</div>

</div>

<!-- Card -->

<div class="row mt-5">

<div class="col-md-4">

<div class="card p-4">

<h3>📚 CRUD Lengkap</h3>

<p>

Tambah, Edit,
Hapus dan
Lihat Data Buku.

</p>

</div>

</div>

<div class="col-md-4">

<div class="card p-4">

<h3>💾 Database</h3>

<p>

Menggunakan
MySQL sebagai
penyimpanan data.

</p>

</div>

</div>

<div class="col-md-4">

<div class="card p-4">

<h3>💻 PHP Native</h3>

<p>

Dibangun dengan
PHP Native
tanpa Framework.

</p>

</div>

</div>

</div>

<div class="footer">

<hr>

© 2026 | UAS Pemrograman Web

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>