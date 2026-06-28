<?php
include "koneksi.php";

if(isset($_POST['simpan'])){
    $nama=$_POST['nama'];
    $telepon=$_POST['telepon'];
    $email=$_POST['email'];
    $alamat=$_POST['alamat'];

    mysqli_query($koneksi,"INSERT INTO kontak(nama,telepon,email,alamat)
    VALUES('$nama','$telepon','$email','$alamat')");

    header("Location: daftar.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Kontak</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

<h2>Tambah Kontak</h2>

<form method="POST">

<input type="text" name="nama" placeholder="Nama"><br><br>

<input type="text" name="telepon" placeholder="No HP"><br><br>

<input type="email" name="email" placeholder="Email"><br><br>

<textarea name="alamat" placeholder="Alamat"></textarea><br><br>

<button type="submit" name="simpan">Simpan</button>

</form>

</div>

</body>
</html>