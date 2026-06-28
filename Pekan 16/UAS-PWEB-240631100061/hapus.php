<?php
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM kontak WHERE id='$id'");

echo "<script>
alert('Data berhasil dihapus');
window.location='daftar.php';
</script>";
?>