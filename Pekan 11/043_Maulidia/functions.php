<?php
function formatNama($nama) {
    return trim(trim($nama));
}

function validasiEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

$jurusan_list = ["Pendidikan Informatika", "Sistem Informasi", "Teknik Komputer"];
?>