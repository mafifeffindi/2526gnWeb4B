<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_kampus");

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
