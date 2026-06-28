<?php
include "config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE Id='$id'");

$d = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Mahasiswa</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<h1>Edit Data Mahasiswa</h1>

<hr>

<a href="index.php">Home</a> |
<a href="tambah.php">Tambah Data</a> |
<a href="daftar.php">Daftar Mahasiswa</a>

<hr>

<div class="form">

<form action="proses/update.php" method="POST">
    
<input type="hidden" name="id" value="<?= $d['Id']; ?>">

<p>
NIM<br>
<input type="text" name="nim" value="<?= $d['NIM']; ?>">
</p>

<p>
Nama<br>
<input type="text" name="nama" value="<?= $d['Nama']; ?>">
</p>

<p>
Jurusan<br>
<input type="text" name="jurusan" value="<?= $d['Jurusan']; ?>">
</p>

<p>
Angkatan<br>
<input type="number" name="angkatan" value="<?= $d['Angkatan']; ?>">
</p>

<button type="submit">Update</button>

</form>

</div>
</body>
</html>