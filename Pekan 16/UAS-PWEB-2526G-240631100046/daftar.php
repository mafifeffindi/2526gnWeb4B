<?php
include "config/koneksi.php";
include "function/fungsi.php";

$data = mysqli_query($koneksi,"SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Daftar Mahasiswa</h1>

<p>
Jumlah Mahasiswa : <b><?= hitungJumlahMahasiswa($koneksi); ?></b>
</p>

<hr>

<a href="index.php">Home</a> |
<a href="tambah.php">Tambah Data</a> |
<a href="daftar.php">Daftar Mahasiswa</a>

<hr>

<table border="1" cellpadding="10" cellspacing="0">

<tr>
    <th>No</th>
    <th>NIM</th>
    <th>Nama</th>
    <th>Jurusan</th>
    <th>Angkatan</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;

while($d = mysqli_fetch_assoc($data)){
?>

<tr>

<td><?= $no++; ?></td>

<td><?= $d['NIM']; ?></td>

<td><?= formatNama($d['Nama']); ?></td>

<td><?= $d['Jurusan']; ?></td>

<td><?= $d['Angkatan']; ?></td>

<td>
    <a href="edit.php?id=<?= $d['Id']; ?>">Edit</a> |
    <a href="hapus.php?id=<?= $d['Id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
</td>

</tr>

<?php } ?>

</table>

</body>
</html>