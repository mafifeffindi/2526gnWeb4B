<?php
require_once 'koneksi.php';
require_once 'functions.php';

// Hanya terima request POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

// 1. Ambil data dari $_POST
$nama    = isset($_POST['nama'])    ? $_POST['nama']    : '';
$email   = isset($_POST['email'])   ? $_POST['email']   : '';
$jurusan = isset($_POST['jurusan']) ? $_POST['jurusan'] : '';

// 2. Validasi tidak boleh kosong
if (isKosong($nama) || isKosong($email) || isKosong($jurusan)) {
    header("Location: index.php?status=error&pesan=Semua+field+wajib+diisi!");
    exit;
}

// 3. Validasi jurusan harus dari daftar yang tersedia (keamanan extra)
if (!in_array($jurusan, $jurusan_list)) {
    header("Location: index.php?status=error&pesan=Jurusan+tidak+valid!");
    exit;
}

// 4. Validasi email menggunakan fungsi dari functions.php
if (!validasiEmail($email)) {
    header("Location: index.php?status=error&pesan=Format+email+tidak+valid!");
    exit;
}

// 5. Format nama menggunakan fungsi dari functions.php (trim + UPPERCASE)
$nama_format = formatNama($nama);

// 6. Simpan ke database menggunakan prepared statement (cegah SQL Injection)
$stmt = mysqli_prepare($conn, "INSERT INTO mahasiswa (nama, email, jurusan) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sss", $nama_format, $email, $jurusan);

if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php?status=sukses&pesan=Mahasiswa+berhasil+didaftarkan!");
} else {
    header("Location: index.php?status=error&pesan=Gagal+menyimpan+data.+Coba+lagi.");
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
exit;
?>
