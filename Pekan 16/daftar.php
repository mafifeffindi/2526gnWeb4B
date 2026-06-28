<?php
include "koneksi.php";

$data = mysqli_query($koneksi, "SELECT * FROM kontak");
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

<a href="tambah.php">+ Tambah Kontak</a>

<br><br>

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
while($d = mysqli_fetch_array($data)){
?>

<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $d['nama']; ?></td>
    <td><?php echo $d['no_hp']; ?></td>
    <td><?php echo $d['email']; ?></td>
    <td><?php echo $d['alamat']; ?></td>
    <td>
        <a href="edit.php?id=<?php echo $d['id']; ?>">Edit</a> |
        <a href="hapus.php?id=<?php echo $d['id']; ?>" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
    </td>
</tr>

<?php } ?>

</table>

<br>

<a href="index.php">Kembali ke Home</a>

</div>

</body>
</html>