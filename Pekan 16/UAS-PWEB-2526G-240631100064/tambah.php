<?php
// ============================================
// FILE: tambah.php
// Halaman: Form Tambah Data Mahasiswa
// ============================================
require 'koneksi.php';

$pesan = '';
if (isset($_GET['status']) && $_GET['status'] == 'berhasil') {
    $pesan = '<div class="alert alert-success">✅ Data mahasiswa berhasil ditambahkan!</div>';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data - Sistem Pendataan Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <a href="index.php" class="brand">🎓 SiPendMa</a>
    <nav>
        <a href="index.php">Beranda</a>
        <a href="tambah.php" class="active">Tambah Data</a>
        <a href="daftar.php">Daftar Data</a>
    </nav>
</div>

<!-- KONTEN -->
<div class="container">
    <div class="card">
        <h2>➕ Tambah Data Mahasiswa</h2>

        <?= $pesan ?>

        <form action="simpan.php" method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label for="nim">NIM <span style="color:red">*</span></label>
                    <input type="text" id="nim" name="nim" placeholder="Contoh: 240631100064" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap <span style="color:red">*</span></label>
                    <input type="text" id="nama" name="nama" placeholder="Nama lengkap mahasiswa" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="prodi">Program Studi <span style="color:red">*</span></label>
                    <input type="text" id="prodi" name="prodi" value="Pendidikan Informatika" required>
                </div>
                <div class="form-group">
                    <label for="angkatan">Angkatan <span style="color:red">*</span></label>
                    <input type="number" id="angkatan" name="angkatan" placeholder="Contoh: 2024" min="2000" max="2099" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin <span style="color:red">*</span></label>
                    <select id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="contoh@email.com">
                </div>
            </div>

            <div class="form-group">
                <label for="no_hp">No. HP</label>
                <input type="text" id="no_hp" name="no_hp" placeholder="Contoh: 08123456789">
            </div>

            <button type="submit" class="btn btn-success">💾 Simpan Data</button>
            <a href="daftar.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<footer>
    &copy; <?= date('Y') ?> Sistem Pendataan Mahasiswa — UAS Pemrograman Web
</footer>

</body>
</html>
