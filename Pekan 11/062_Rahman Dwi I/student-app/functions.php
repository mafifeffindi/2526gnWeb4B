<?php

// Format nama (huruf besar di awal)
function formatNama($nama) {
    return ucwords(strtolower($nama));
}

// Validasi email
function validasiEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Array jurusan
$jurusan_list = ["Informatika", "Sistem Informasi", "Teknik Komputer"];

?>