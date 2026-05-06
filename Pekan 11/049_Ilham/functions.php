<?php
// 1. Fungsi format nama: trim spasi + ubah jadi HURUF KAPITAL SEMUA
function formatNama($nama) {
    return strtoupper(trim($nama));
}

// 2. Fungsi validasi email
function validasiEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// 3. Fungsi validasi input tidak boleh kosong
function isKosong($value) {
    return empty(trim($value));
}

// 4. Array daftar jurusan
$jurusan_list = ["Informatika", "Sistem Informasi", "Teknik Komputer"];
?>
