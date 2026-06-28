<?php
// Menggunakan include/require
require_once 'koneksi.php';

// Mengambil data mahasiswa
$query = "SELECT * FROM mahasiswa ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendataan Mahasiswa</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">Data Mahasiswa</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="index.php">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="tambah.php">Tambah Data</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="p-5 bg-white rounded-3 shadow-sm">
                <h2>Selamat Datang di Sistem Pendataan Mahasiswa</h2>
                <p class="lead">Aplikasi internal untuk mengelola data profile mahasiswa secara terpusat, cepat, dan akurat.</p>
                <hr class="my-4">
                <a class="btn btn-primary btn-lg" href="tambah.php" role="button">Tambah Mahasiswa Baru</a>
            </div>
        </div>
    </div>

    <div class="card p-4">
        <h4 class="mb-3">Daftar Mahasiswa Aktif</h4>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Email</th>
                        <th>Angkatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    // Perulangan (While Loop) untuk menampilkan data
                    while($row = mysqli_fetch_assoc($result)) : 
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nim']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <!-- Menggunakan Fungsi Kustom 2 -->
                        <td><?= formatJurusan($row['jurusan']); ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['angkatan']; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                    
                    <?php 
                    // Percabangan jika data kosong
                    if(mysqli_num_rows($result) == 0) {
                        echo "<tr><td colspan='7' class='text-center text-muted'>Belum ada data mahasiswa.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<footer>
    <div class="container">
        <p>&copy; 2026 - UAS Pemrograman Web</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>