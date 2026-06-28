<?php
include "config/koneksi.php";

$id=$_GET['id'];

$data=mysqli_query($conn,"SELECT * FROM mahasiswa WHERE id='$id'");
$d=mysqli_fetch_array($data);
?>

<form action="update.php" method="POST">

<input type="hidden" name="id" value="<?= $d['id']; ?>">

NIM
<input type="text" name="nim" value="<?= $d['nim']; ?>"><br>

Nama
<input type="text" name="nama" value="<?= $d['nama']; ?>"><br>

Jurusan
<input type="text" name="jurusan" value="<?= $d['jurusan']; ?>"><br>

Angkatan
<input type="number" name="angkatan" value="<?= $d['angkatan']; ?>"><br>

<input type="submit" value="Update">

</form>
