<?php
include 'koneksi.php';

// Tambah Buku
function tambah($data)
{
    global $conn;

    $judul = htmlspecialchars($data["judul"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $tahun = htmlspecialchars($data["tahun"]);

    $query = "INSERT INTO buku VALUES ('','$judul','$penulis','$penerbit','$tahun')";
    return mysqli_query($conn, $query);
}

// Ambil Data
function tampil()
{
    global $conn;

    $data = mysqli_query($conn, "SELECT * FROM buku");

    $rows = [];

    while($row = mysqli_fetch_assoc($data)){
        $rows[] = $row;
    }

    return $rows;
}
?>