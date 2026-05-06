<?php
require "koneksi.php";

$id = $_GET['id'];

$query = "DELETE FROM mahasiswa WHERE id=$id";

mysqli_query($conn, $query);

header("Location: tampil.php");
exit;
?>