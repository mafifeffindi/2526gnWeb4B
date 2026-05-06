<?php

function formatNama($nama) {
    return strtoupper(trim($nama));
}

function validasiEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function getJurusan() {
    return [
        "Pendidikan Informatika",
        "Pendidikan Guru PAUD",
        "Pendidikan Guru Sekolah Dasar",
        "Pendidikan Bahasa dan Sastra",
        "Pendidikan Ilmu Pengetahuan Alam"
    ];
}

?>