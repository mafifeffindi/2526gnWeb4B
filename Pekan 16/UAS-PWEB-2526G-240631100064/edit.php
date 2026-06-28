<?php
// ============================================
// FILE: edit.php
// Halaman: Form Edit Data Mahasiswa
// ============================================
require 'koneksi.php';

// Validasi ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: daftar.php");
    exit;
}

$id    = (int)$_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id=$id");

if (mysqli_num_rows($query) == 0) {
    header("Location: daftar.php");
    exit;
}

$mhs = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data - Sistem Pendataan Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <a href="index.php" class="brand">🎓 SiPendMa</a>
    <nav>
        <a href="index.php">Beranda</a>
        <a href="tambah.php">Tambah Data</a>
        <a href="daftar.php">Daftar Data</a>
    </nav>
</div>

<!-- KONTEN -->
<div class="container">
    <div class="card">
        <h2>✏️ Edit Data Mahasiswa</h2>

        <form action="update.php" method="POST">
            <!-- ID tersembunyi -->
            <input type="hidden" name="id" value="<?= $mhs['id'] ?>">

            <div class="form-row">
                <div class="form-group">
                    <label for="nim">NIM <span style="color:red">*</span></label>
                    <input type="text" id="nim" name="nim"
                           value="<?= bersihkan($mhs['nim']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap <span style="color:red">*</span></label>
                    <input type="text" id="nama" name="nama"
                           value="<?= bersihkan($mhs['nama']) ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="prodi">Program Studi <span style="color:red">*</span></label>
                    <input type="text" id="prodi" name="prodi"
                           value="<?= bersihkan($mhs['prodi']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="angkatan">Angkatan <span style="color:red">*</span></label>
                    <input type="number" id="angkatan" name="angkatan"
                           value="<?= $mhs['angkatan'] ?>" min="2000" max="2099" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin <span style="color:red">*</span></label>
                    <select id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-laki" <?= $mhs['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="Perempuan" <?= $mhs['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email"
                           value="<?= bersihkan($mhs['email']) ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="no_hp">No. HP</label>
                <input type="text" id="no_hp" name="no_hp"
                       value="<?= bersihkan($mhs['no_hp']) ?>">
            </div>

            <button type="submit" class="btn btn-primary">💾 Perbarui Data</button>
            <a href="daftar.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<footer>
    &copy; <?= date('Y') ?> Sistem Pendataan Mahasiswa — UAS Pemrograman Web
</footer>

</body>
</html>
