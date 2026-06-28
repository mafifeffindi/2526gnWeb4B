<?php

function salam(){

    return "Selamat Datang di Sistem Pendataan Mahasiswa";

}

function jumlahMahasiswa($koneksi){

    $query=mysqli_query($koneksi,"SELECT * FROM mahasiswa");

    return mysqli_num_rows($query);

}

?>