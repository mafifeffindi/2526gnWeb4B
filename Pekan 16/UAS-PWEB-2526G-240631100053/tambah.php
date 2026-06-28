<?php
require_once 'koneksi.php';

$pesan = "";

// Form Processing (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menggunakan Fungsi Kustom 1
    $nim      = bersihkanInput($_POST['nim']);
    $nama     = bersihkanInput($_POST['nama']);
    $jurusan  = bersihkanInput($_POST['jurusan']);
    $email    = bersihkanInput($_POST['email']);
    $angkatan = bersihkanInput($_POST['angkatan']);

    // Variabel Query
    $query = "INSERT INTO mahasiswa (nim, nama, jurusan, email, angkatan) VALUES ('$nim', '$nama', '$jurusan', '$email', '$angkatan')";
    
    // Percabangan
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit;
    } else {
        $pesan = "<div class='alert alert-danger'>Gagal menambahkan data: " . mysqli_error($koneksi) . "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">Data Mahasiswa</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                <li class="nav-item"><a class="nav-link active" href="tambah.php">Tambah Data</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container" style="max-width: 600px;">
    <div class="card p-4">
        <h4 class="mb-4 text-center">Form Tambah Mahasiswa</h4>
        <?= $pesan; ?>
        <form action="tambah.php" method="POST">
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-type form-control" required placeholder="Contoh: 230411100001">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" required placeholder="Masukkan Nama">
            </div>
            <div class="mb-3">
                <label class="form-label">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" required placeholder="Contoh: Pendidikan Informatika">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required placeholder="Contoh: nama@example.com">
            </div>
            <div class="mb-3">
                <label class="form-label">Angkatan</label>
                <input type="number" name="angkatan" class="form-control" required placeholder="Contoh: 2023">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">Simpan Data</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>