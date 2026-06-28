<?php
// ============================================
// FILE: index.php
// Halaman: Beranda
// ============================================
require 'koneksi.php';

// Hitung total mahasiswa
$query_total = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM mahasiswa");
$row_total = mysqli_fetch_assoc($query_total);
$total = $row_total['total'];

// Hitung laki-laki dan perempuan
$query_lk = mysqli_query($koneksi, "SELECT COUNT(*) as jml FROM mahasiswa WHERE jenis_kelamin='Laki-laki'");
$lk = mysqli_fetch_assoc($query_lk)['jml'];

$query_pr = mysqli_query($koneksi, "SELECT COUNT(*) as jml FROM mahasiswa WHERE jenis_kelamin='Perempuan'");
$pr = mysqli_fetch_assoc($query_pr)['jml'];

// Ambil 5 mahasiswa terbaru
$query_baru = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY created_at DESC LIMIT 5");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Sistem Pendataan Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <a href="index.php" class="brand">🎓 SiPendMa</a>
    <nav>
        <a href="index.php" class="active">Beranda</a>
        <a href="tambah.php">Tambah Data</a>
        <a href="daftar.php">Daftar Data</a>
    </nav>
</div>

<!-- KONTEN -->
<div class="container">

    <!-- Hero -->
    <div class="hero">
        <h1>Sistem Pendataan Mahasiswa</h1>
        <p>Universitas Trunojoyo Madura — Pendidikan Informatika</p>
    </div>

    <!-- Statistik -->
    <div class="stats">
        <div class="stat-box">
            <div class="angka"><?= $total ?></div>
            <div class="label">Total Mahasiswa</div>
        </div>
        <div class="stat-box">
            <div class="angka"><?= $lk ?></div>
            <div class="label">Laki-laki</div>
        </div>
        <div class="stat-box">
            <div class="angka"><?= $pr ?></div>
            <div class="label">Perempuan</div>
        </div>
    </div>

    <!-- Tabel terbaru -->
    <div class="card">
        <h2>📋 Mahasiswa Terbaru</h2>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Angkatan</th>
                        <th>Jenis Kelamin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($query_baru) > 0): ?>
                        <?php while ($mhs = mysqli_fetch_assoc($query_baru)): ?>
                        <tr>
                            <td><?= bersihkan($mhs['nim']) ?></td>
                            <td><?= bersihkan($mhs['nama']) ?></td>
                            <td><?= bersihkan($mhs['prodi']) ?></td>
                            <td><?= $mhs['angkatan'] ?></td>
                            <td>
                                <?php if ($mhs['jenis_kelamin'] == 'Laki-laki'): ?>
                                    <span class="badge badge-laki">Laki-laki</span>
                                <?php else: ?>
                                    <span class="badge badge-perempuan">Perempuan</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="edit.php?id=<?= $mhs['id'] ?>" class="btn btn-warning">Edit</a>
                                <a href="hapus.php?id=<?= $mhs['id'] ?>" class="btn btn-danger"
                                   onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="6" style="text-align:center; color:#888;">Belum ada data.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <br>
        <a href="daftar.php" class="btn btn-primary">Lihat Semua Data →</a>
    </div>

</div>

<footer>
    &copy; <?= date('Y') ?> Sistem Pendataan Mahasiswa — UAS Pemrograman Web
</footer>

</body>
</html>
