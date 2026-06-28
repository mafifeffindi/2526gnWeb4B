<?php

include "koneksi.php";

$id=$_GET['id'];

mysqli_query($koneksi,"DELETE FROM kontak WHERE id='$id'");

header("Location: daftar.php");

?>