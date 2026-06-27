<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM barang WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container mt-5">

<h2>Edit Data Barang</h2>

<form action="update.php" method="POST">

    <input type="hidden" name="id" value="<?= $row['id']; ?>">

    <div class="mb-3">
        <label>Kode Barang</label>
        <input type="text" name="kode_barang" class="form-control" value="<?= $row['kode_barang']; ?>" required>
    </div>

    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control" value="<?= $row['nama_barang']; ?>" required>
    </div>

    <div class="mb-3">
        <label>Kategori</label>
        <input type="text" name="kategori" class="form-control" value="<?= $row['kategori']; ?>" required>
    </div>

    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" name="jumlah" class="form-control" value="<?= $row['jumlah']; ?>" required>
    </div>

    <div class="mb-3">
        <label>Kondisi</label>
        <select name="kondisi" class="form-control">
            <option value="Baik" <?= ($row['kondisi']=="Baik") ? "selected" : ""; ?>>Baik</option>
            <option value="Rusak" <?= ($row['kondisi']=="Rusak") ? "selected" : ""; ?>>Rusak</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Lokasi</label>
        <input type="text" name="lokasi" class="form-control" value="<?= $row['lokasi']; ?>" required>
    </div>

    <button type="submit" class="btn btn-warning">Update</button>
    <a href="daftar.php" class="btn btn-secondary">Kembali</a>

</form>

</div>

</body>
</html>
