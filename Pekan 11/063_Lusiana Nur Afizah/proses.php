<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $tgl = $_POST['tgl_lahir'];

    // Query INSERT untuk 8 kolom (termasuk ID dan created_at yang otomatis)
    $sql = "INSERT INTO mahasiswa (nama, email, jurusan, alamat, jenis_kelamin, tgl_lahir) 
            VALUES ('$nama', '$email', '$jurusan', '$alamat', '$jk', '$tgl')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data Berhasil Disimpan!'); window.location='tampil.php';</script>";
    } else {
        echo "Gagal: " . mysqli_error($conn);
    }
}
?>