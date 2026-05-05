<?php
include 'koneksi.php';
include 'functions.php';

if (isset($_POST['simpan'])) {
    $nama = formatNama($_POST['nama']); // Menggunakan fungsi format[cite: 1]
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];

    if (validasiEmail($email)) { // Validasi email[cite: 1]
        $sql = "INSERT INTO mahasiswa (nama, email, jurusan) VALUES ('$nama', '$email', '$jurusan')";
        if (mysqli_query($conn, $sql)) {
            header("Location: tampil.php");
        }
    } else {
        echo "Email tidak valid! <a href='index.php'>Kembali</a>";
    }
}
?>
