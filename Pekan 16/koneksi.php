<?php
// =============================================
// File: koneksi.php
// Deskripsi: File koneksi database MySQL
// =============================================

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_mahasiswa');

$koneksi = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$koneksi) {
    die("<div style='color:red; padding:20px; font-family:sans-serif;'>
        <strong>Koneksi database gagal!</strong><br>
        Error: " . mysqli_connect_error() . "
    </div>");
}

mysqli_set_charset($koneksi, 'utf8');

// =============================================
// FUNCTION 1: Sanitasi input user
// =============================================
function sanitasi($data) {
    global $koneksi;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($koneksi, $data);
    return $data;
}

// =============================================
// FUNCTION 2: Format tanggal Indonesia
// =============================================
function formatTanggal($tanggal) {
    $bulan = [
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
        '04' => 'April',   '05' => 'Mei',       '06' => 'Juni',
        '07' => 'Juli',    '08' => 'Agustus',   '09' => 'September',
        '10' => 'Oktober', '11' => 'November',  '12' => 'Desember'
    ];
    if (empty($tanggal)) return '-';
    $parts = explode('-', date('Y-m-d', strtotime($tanggal)));
    return $parts[2] . ' ' . $bulan[$parts[1]] . ' ' . $parts[0];
}

// =============================================
// FUNCTION 3: Hitung total mahasiswa
// =============================================
function totalMahasiswa() {
    global $koneksi;
    $result = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM mahasiswa");
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

// =============================================
// FUNCTION 4: Ambil statistik status
// =============================================
function statistikStatus() {
    global $koneksi;
    $result = mysqli_query($koneksi, "SELECT status, COUNT(*) as jumlah FROM mahasiswa GROUP BY status");
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[$row['status']] = $row['jumlah'];
    }
    return $data;
}
?>
