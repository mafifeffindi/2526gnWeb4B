<?php
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM buku WHERE id='$id'");

echo "<script>
alert('Data berhasil dihapus');
window.location='daftar.php';
</script>";
?>