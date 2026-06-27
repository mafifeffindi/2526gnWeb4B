<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>

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

        <div class="card-header bg-success text-white">

            <h4>

                <i class="bi bi-person-plus-fill"></i>

                Tambah Data Mahasiswa

            </h4>

        </div>

        <div class="card-body">

            <form action="proses_tambah.php" method="POST">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            NIM

                        </label>

                        <input
                        type="text"
                        name="nim"
                        class="form-control"
                        placeholder="Masukkan NIM"
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
                        placeholder="Masukkan Nama"
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
                        placeholder="Masukkan Program Studi"
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
                        placeholder="Contoh : 4"
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
                    placeholder="Masukkan Email"
                    required>

                </div>

                <button type="submit" class="btn btn-success">

                    <i class="bi bi-check-circle"></i>

                    Simpan

                </button>

                <a href="daftar.php" class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>

                    Kembali

                </a>

                <button type="reset" class="btn btn-warning text-white">

                    <i class="bi bi-arrow-clockwise"></i>

                    Reset

                </button>

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