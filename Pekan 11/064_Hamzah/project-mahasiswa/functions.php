<?php
// Fungsi format nama: Huruf besar semua dan hapus spasi di ujung (trim)
function formatNama($nama) {
    return strtoupper(trim($nama));
}

// Fungsi validasi email
function validasiEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Array jurusan (Sesuai soal)
$jurusan_list = ["Informatika", "Sistem Informasi", "Teknik Komputer"];
?>