<?php
// ============================================
// FILE: koneksi.php
// Fungsi: Koneksi ke database MySQL
// ============================================

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_mahasiswa');

$koneksi = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$koneksi) {
    die("<div style='color:red; padding:20px;'>
        <strong>Koneksi database gagal!</strong><br>
        Error: " . mysqli_connect_error() . "
    </div>");
}

mysqli_set_charset($koneksi, 'utf8');

// ============================================
// FUNGSI 1: Format tanggal ke Indonesia
// ============================================
function formatTanggal($tanggal) {
    $bulan = [
        1 => 'Januari', 'Februari', 'Maret', 'April',
        'Mei', 'Juni', 'Juli', 'Agustus',
        'September', 'Oktober', 'November', 'Desember'
    ];
    $t = explode('-', substr($tanggal, 0, 10));
    return $t[2] . ' ' . $bulan[(int)$t[1]] . ' ' . $t[0];
}

// ============================================
// FUNGSI 2: Sanitasi input dari user
// ============================================
function bersihkan($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
