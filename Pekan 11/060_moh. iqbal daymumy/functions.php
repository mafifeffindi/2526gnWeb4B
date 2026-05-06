<?php
function formatNama($nama) {
    return strtoupper(trim($nama));
}

function validasiEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

$jurusan_list = ["Pendidikan Informatika",
    "Pendidikan Guru Sekolah Dasar",
    "Pendidikan Guru Pendidikan Anak Usia Dini",
    "Pendidikan Bahasa dan Sastra Indonesia",
    "Pendidikan Ilmu Pengetahuan Alam"];
?>