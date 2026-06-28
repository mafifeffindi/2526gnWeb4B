<?php

include "koneksi.php";


if(isset($_POST['simpan'])){


$judul=$_POST['judul'];
$penulis=$_POST['penulis'];
$penerbit=$_POST['penerbit'];
$tahun=$_POST['tahun'];
$kategori=$_POST['kategori'];
$stok=$_POST['stok'];


mysqli_query($conn,
"INSERT INTO tb_buku VALUES(
'',
'$judul',
'$penulis',
'$penerbit',
'$tahun',
'$kategori',
'$stok'
)");

header("location:index.php");

}

?>


<!DOCTYPE html>
<html>

<head>

<title>Tambah Buku</title>

<link rel="stylesheet" href="style.css">

</head>


<body>


<div class="container">


<h2>Tambah Buku</h2>


<form method="POST">


<input name="judul" placeholder="Judul Buku" required>

<input name="penulis" placeholder="Penulis" required>

<input name="penerbit" placeholder="Penerbit">

<input name="tahun" placeholder="Tahun Terbit">

<input name="kategori" placeholder="Kategori">

<input name="stok" placeholder="Stok">


<button name="simpan">
Simpan
</button>


</form>


</div>


</body>

</html>
