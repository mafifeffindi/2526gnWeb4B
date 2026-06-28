<?php
include "koneksi.php";

$data = mysqli_query($conn,"SELECT * FROM tb_buku");

?>


<!DOCTYPE html>
<html>
<head>

<title>Sistem Pendataan Buku</title>

<link rel="stylesheet" href="style.css">

</head>

<body>


<div class="container">

<h1>Sistem Pendataan Buku</h1>


<a href="tambah.php" class="btn">
+ Tambah Buku
</a>


<table>

<tr>
<th>No</th>
<th>Judul</th>
<th>Penulis</th>
<th>Penerbit</th>
<th>Tahun</th>
<th>Kategori</th>
<th>Stok</th>
<th>Aksi</th>
</tr>


<?php

$no=1;

while($row=mysqli_fetch_assoc($data)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $row['judul']; ?></td>

<td><?= $row['penulis']; ?></td>

<td><?= $row['penerbit']; ?></td>

<td><?= $row['tahun']; ?></td>

<td><?= $row['kategori']; ?></td>

<td><?= $row['stok']; ?></td>


<td>

<a href="edit.php?id=<?= $row['id_buku'];?>" class="edit">
Edit
</a>


<a href="hapus.php?id=<?= $row['id_buku'];?>" 
class="hapus"
onclick="return confirm('Hapus data?')">
Hapus
</a>


</td>


</tr>


<?php } ?>


</table>


</div>


</body>
</html>
