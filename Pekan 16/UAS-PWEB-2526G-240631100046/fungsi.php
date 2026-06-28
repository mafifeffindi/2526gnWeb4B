<?php

function formatNama($nama){
    return ucwords(strtolower($nama));
}

function hitungJumlahMahasiswa($koneksi){

    $query = mysqli_query($koneksi,"SELECT * FROM mahasiswa");

    return mysqli_num_rows($query);

}

?>