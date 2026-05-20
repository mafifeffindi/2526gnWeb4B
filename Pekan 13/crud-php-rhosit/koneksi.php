<?php
$koneksi = mysqli_connect("localhost", "root", "", "kampus-db");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}