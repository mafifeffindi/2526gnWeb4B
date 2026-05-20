<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_mariska");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>