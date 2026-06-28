<?php
// ============================================
// FILE: daftar.php
// Halaman: Daftar Semua Mahasiswa
// ============================================
require 'koneksi.php';

// Fitur pencarian (GET)
$keyword = '';
$where   = '';
if (isset($_GET['cari']) && $_GET['cari'] != '') {
    $keyword = bersihkan($_GET['cari']);
    $where   = "WHERE nim LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR prodi LIKE '%$keyword%'";
}

$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa $where ORDER BY created_at DESC");
$total = mysqli_num_rows($query);

// Pesan setelah aksi
$pesan = '';
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'hapus_berhasil') {
        $pesan = '<div class="alert alert-success">✅ Data berhasil dihapus.</div>';
    } elseif ($_GET['status'] == 'edit_berhasil') {
        $pesan = '<div class="alert alert-success">✅ Data berhasil diperbarui.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa - Sistem Pendataan Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <a href="index.php" class="brand">🎓 SiPendMa</a>
    <nav>
        <a href="index.php">Beranda</a>
        <a href="tambah.php">Tambah Data</a>
        <a href="daftar.php" class="active">Daftar Data</a>
    </nav>
</div>

<!-- KONTEN -->
<div class="container">
    <div class="card">
        <h2>📋 Daftar Mahasiswa</h2>

        <?= $pesan ?>

        <!-- Search -->
        <form method="GET" action="daftar.php">
            <div class="search-bar">
                <input type="text" name="cari" placeholder="Cari berdasarkan NIM, Nama, atau Prodi..."
                       value="<?= htmlspecialchars($keyword) ?>">
                <button type="submit" class="btn btn-primary">🔍 Cari</button>
                <?php if ($keyword): ?>
                    <a href="daftar.php" class="btn btn-secondary">✖ Reset</a>
                <?php endif; ?>
            </div>
        </form>

        <p style="margin-bottom:15px; color:#666; font-size:14px;">
            Menampilkan <strong><?= $total ?></strong> data
            <?= $keyword ? "untuk pencarian: <em>\"$keyword\"</em>" : '' ?>
        </p>

        <a href="tambah.php" class="btn btn-success" style="margin-bottom:15px;">➕ Tambah Mahasiswa</a>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Angkatan</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                        <th>No. HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($total > 0): ?>
                        <?php $no = 1; ?>
                        <?php while ($mhs = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td><?= $no++ ?></td>
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
                            <td><?= bersihkan($mhs['email']) ?: '-' ?></td>
                            <td><?= bersihkan($mhs['no_hp']) ?: '-' ?></td>
                            <td>
                                <a href="edit.php?id=<?= $mhs['id'] ?>" class="btn btn-warning">✏️ Edit</a>
                                <a href="hapus.php?id=<?= $mhs['id'] ?>" class="btn btn-danger"
                                   onclick="return confirm('Yakin ingin menghapus data <?= bersihkan($mhs['nama']) ?>?')">🗑️ Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9" style="text-align:center; color:#888; padding:30px;">
                                <?= $keyword ? "Data tidak ditemukan untuk \"$keyword\"." : 'Belum ada data mahasiswa.' ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<footer>
    &copy; <?= date('Y') ?> Sistem Pendataan Mahasiswa — UAS Pemrograman Web
</footer>

</body>
</html>
