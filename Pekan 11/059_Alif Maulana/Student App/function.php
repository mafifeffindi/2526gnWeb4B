<?php
// Fungsi format nama (String Manipulation)
function formatNama($nama) {
    return strtoupper(trim($nama));
}

// Fungsi validasi email
function validasiEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Array daftar jurusan[cite: 1]
$jurusan_list = ["Informatika", "Sistem Informasi", "Teknik Komputer"];
?>
