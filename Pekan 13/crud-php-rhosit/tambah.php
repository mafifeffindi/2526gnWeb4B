<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];

    $query = "INSERT INTO mahasiswa (nim, nama, prodi) VALUES ('$nim', '$nama', '$prodi')";
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form action="" method="POST">
        <label for="nim">NIM:</label><br>
        <input type="text" id="nim" name="nim" placeholder="Masukkan NIM" required><br><br>
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required><br><br>
        <label for="prodi">Prodi:</label><br>
        <input type="text" id="prodi" name="prodi" placeholder="Masukkan Prodi" required><br><br>
        <input type="submit" name="submit" value="Simpan">
    </form>
</html>