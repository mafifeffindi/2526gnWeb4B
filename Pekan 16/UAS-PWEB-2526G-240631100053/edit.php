<?php
require_once 'koneksi.php';

$pesan = "";

// Form Processing (GET untuk ambil data awal)
if (isset($_GET['id'])) {
    $id = bersihkanInput($_GET['id']);
    $query = "SELECT * FROM mahasiswa WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}

// Form Processing (POST untuk update data)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id       = bersihkanInput($_POST['id']);
    $nim      = bersihkanInput($_POST['nim']);
    $nama     = bersihkanInput($_POST['nama']);
    $jurusan  = bersihkanInput($_POST['jurusan']);
    $email    = bersihkanInput($_POST['email']);
    $angkatan = bersihkanInput($_POST['angkatan']);

    $query_update = "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan', email='$email', angkatan='$angkatan' WHERE id='$id'";
    
    // Percabangan
    if (mysqli_query($koneksi, $query_update)) {
        header("Location: index.php");
        exit;
    } else {
        $pesan = "<div class='alert alert-danger'>Gagal memperbarui data: " . mysqli_error($koneksi) . "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">Data Mahasiswa</a>
    </div>
</nav>

<div class="container" style="max-width: 600px;">
    <div class="card p-4">
        <h4 class="mb-4 text-center">Form Edit Mahasiswa</h4>
        <?= $pesan; ?>
        <form action="edit.php?id=<?= $data['id']; ?>" method="POST">
            <input type="hidden" name="id" value="<?= $data['id']; ?>">
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" value="<?= $data['nim']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" value="<?= $data['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" value="<?= $data['jurusan']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $data['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Angkatan</label>
                <input type="number" name="angkatan" class="form-control" value="<?= $data['angkatan']; ?>" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-warning">Perbarui Data</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>