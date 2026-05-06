<?php
function formatNama($nama) {
    return ucwords(strtolower(trim($nama)));
}

function validasiEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

$jurusan_list = ["PGSD", "PBSI", "Pendidikan Informatika", "Pendidikan IPA", "PG-PAUD"];
?>