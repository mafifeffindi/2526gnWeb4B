<?php
session_start();
// if($_SESSION['status'] != "login"){ header("location:login.php"); exit; } // (Gunakan jika pakai login)
include 'koneksi.php';

// 1. MEMBUAT FUNGSI & MANIPULASI STRING
// Fungsi untuk memastikan awalan setiap kata adalah huruf kapital (contoh: "budi santoso" -> "Budi Santoso")
function formatNama($string_nama) {
    // strtolower() membuat huruf kecil semua, ucwords() membuat awalan kapital
    $nama_rapi = ucwords(strtolower(trim($string_nama)));
    return $nama_rapi;
}

// Fungsi untuk mengecek apakah format email valid
function validasiEmail($string_email) {
    if (filter_var($string_email, FILTER_VALIDATE_EMAIL)) {
        return true; // Email valid
    } else {
        return false; // Email tidak valid
    }
}

// 2. PROSES PENYIMPANAN DATA
if(isset($_POST['simpan'])){
    // Menangkap data (Array $_POST)
    $nim = $_POST['nim'];
    $nama_mentah = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $email_mentah = $_POST['email'];
    $no_hp = $_POST['no_hp'];

    // Menerapkan Fungsi
    $nama_diproses = formatNama($nama_mentah);
    
    // Validasi sebelum disimpan ke database
    if(validasiEmail($email_mentah) == false) {
        echo "<script>alert('Gagal: Format email tidak valid!'); window.location='tambah.php';</script>";
        exit;
    }

    // Jika valid, simpan ke database
    mysqli_query($koneksi, "INSERT INTO mahasiswa (nim, nama, prodi, email, no_hp) VALUES ('$nim', '$nama_diproses', '$prodi', '$email_mentah', '$no_hp')");
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Tambah Data Mahasiswa</h4>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label>NIM</label>
                        <input type="text" name="nim" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Program Studi</label>
                        <input type="text" name="prodi" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Nomor HP</label>
                        <input type="text" name="no_hp" class="form-control" required>
                    </div>
                    <button type="submit" name="simpan" class="btn btn-success">Simpan Data</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>