<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_kontak";

$conn = mysqli_connect($host,$user,$pass,$db);

if(!$conn){
    die("Koneksi Gagal : ".mysqli_connect_error());
}

function bersihkan($data){
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars($data));
}

function jumlahKontak(){
    global $conn;

    $query = mysqli_query($conn,"SELECT * FROM kontak");

    return mysqli_num_rows($query);
}

?>