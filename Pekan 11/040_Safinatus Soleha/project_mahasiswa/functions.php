<?php

function formatNama($nama) {
    return strtoupper(trim($nama));
}

function validasiEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

$jurusan_list = ["Informatika", "Sistem Informasi", "Teknik Komputer"];

?>