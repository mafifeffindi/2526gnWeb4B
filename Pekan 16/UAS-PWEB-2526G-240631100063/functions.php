<?php
include "koneksi.php";

function tampil(){
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM buku");
    $rows = [];

    while($row = mysqli_fetch_assoc($query)){
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data){
    global $conn;

    $judul = htmlspecialchars($data["judul"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $tahun = htmlspecialchars($data["tahun_terbit"]);

    mysqli_query($conn, "INSERT INTO buku VALUES('', '$judul', '$penulis', '$penerbit', '$tahun')");

    echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href='daftar.php';
          </script>";
}
?>
