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

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

<!-- Dashboard -->

<div class="container mt-5">

    <div class="dashboard-title">

        <h2>Selamat Datang 👋</h2>

        <p>

            Aplikasi ini digunakan untuk mengelola data mahasiswa menggunakan
            PHP Native dan MySQL.

        </p>

    </div>

    <div class="row">

        <!-- Total Mahasiswa -->

        <div class="col-md-6">

            <div class="info-card">

                <i class="bi bi-people-fill text-primary" style="font-size:60px;"></i>

                <h5 class="mt-3">

                    Total Mahasiswa

                </h5>

                <h1>

                    <?php echo jumlahMahasiswa($koneksi); ?>

                </h1>

            </div>

        </div>

        <!-- Status -->

        <div class="col-md-6">

            <div class="info-card">

                <i class="bi bi-check-circle-fill text-success" style="font-size:60px;"></i>

                <h5 class="mt-3">

                    Status Sistem

                </h5>

                <h1 class="text-success">

                    Aktif

                </h1>

            </div>

        </div>

    </div>

    <div class="text-center mt-5">

        <a href="tambah.php" class="btn btn-success btn-lg">

            <i class="bi bi-plus-circle"></i>

            Tambah Data

        </a>

        <a href="daftar.php" class="btn btn-primary btn-lg">

            <i class="bi bi-table"></i>

            Daftar Mahasiswa

        </a>

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