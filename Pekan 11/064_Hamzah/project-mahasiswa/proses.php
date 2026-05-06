<?php
include 'koneksi.php';
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Ambil data dari $_POST
    $nama_input = $_POST['nama'];
    $email_input = $_POST['email'];
    $jurusan = $_POST['jurusan'];

    // 2. Gunakan fungsi (Kriteria Penilaian: Pengolahan String & Fungsi)
    $nama_bersih = formatNama($nama_input); // Akan jadi huruf kapital & tanpa spasi ujung
    
    // 3. Validasi Email
    if (validasiEmail($email_input)) {
        // Jika valid, masukkan ke database
        $sql = "INSERT INTO mahasiswa (nama, email, jurusan) VALUES ('$nama_bersih', '$email_input', '$jurusan')";
        
        if (mysqli_query($conn, $sql)) {
            // Jika berhasil, lempar ke halaman tampil dengan pesan sukses
            header("Location: tampil.php?status=sukses");
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Format email salah!'); window.history.back();</script>";
    }
}
?>