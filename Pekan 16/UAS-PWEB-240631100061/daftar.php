<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kontak</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

<h2>Daftar Kontak</h2>

<table border="1" cellpadding="10" cellspacing="0" width="100%">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>No HP</th>
    <th>Email</th>
    <th>Alamat</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;
$data = mysqli_query($koneksi, "SELECT * FROM kontak");

while($d = mysqli_fetch_array($data)){
?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $d['nama']; ?></td>
    <td><?= $d['no_hp']; ?></td>
    <td><?= $d['email']; ?></td>
    <td><?= $d['alamat']; ?></td>
    <td>
        <a href="edit.php?id=<?= $d['id']; ?>">Edit</a> |
        <a href="hapus.php?id=<?= $d['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
    </td>
</tr>

<?php } ?>

</table>

<br>

<a href="tambah.php">+ Tambah Kontak</a> |
<a href="index.php">Home</a>

</div>

</body>
</html>