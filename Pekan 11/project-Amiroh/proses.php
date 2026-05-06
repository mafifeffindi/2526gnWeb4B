<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    exit;
}

require "koneksi.php";
include "functions.php";

$nama = formatNama($_POST['nama']);
$email = $_POST['email'];
$jurusan = $_POST['jurusan'];

if (!validasiEmail($email)) {
    echo "Email tidak valid!";
    exit;
}

$query = "INSERT INTO mahasiswa (nama, email, jurusan)
          VALUES ('$nama', '$email', '$jurusan')";

mysqli_query($conn, $query);

header("Location: tampil.php");
exit;
?>