<?php
include "koneksi.php";

$id=$_GET['id'];

$data=mysqli_query($koneksi,"SELECT * FROM kontak WHERE id='$id'");
$d=mysqli_fetch_array($data);

if(isset($_POST['update'])){

$nama=$_POST['nama'];
$telepon=$_POST['telepon'];
$email=$_POST['email'];
$alamat=$_POST['alamat'];

mysqli_query($koneksi,"UPDATE kontak SET
nama='$nama',
telepon='$telepon',
email='$email',
alamat='$alamat'
WHERE id='$id'");

header("Location: daftar.php");

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Kontak</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

<h2>Edit Kontak</h2>

<form method="POST">

<input type="text" name="nama" value="<?= $d['nama']; ?>"><br><br>

<input type="text" name="telepon" value="<?= $d['telepon']; ?>"><br><br>

<input type="email" name="email" value="<?= $d['email']; ?>"><br><br>

<textarea name="alamat"><?= $d['alamat']; ?></textarea><br><br>

<button name="update">Update</button>

</form>

</div>

</body>
</html>