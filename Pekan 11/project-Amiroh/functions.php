<?php

$jurusan_list = [
    "Teknik Informatika",
    "Sistem Informasi",
    "Manajemen",
    "Akuntansi"
];

function formatNama($nama){
    return strtoupper($nama);
}

function validasiEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

?>