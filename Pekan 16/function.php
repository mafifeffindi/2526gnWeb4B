<?php
include "config/koneksi.php";

function tampilData(){
    global $conn;
    return mysqli_query($conn,"SELECT * FROM mahasiswa");
}

function jumlahData(){
    global $conn;
    $q=mysqli_query($conn,"SELECT * FROM mahasiswa");
    return mysqli_num_rows($q);
}
?>
