<?php

include "config/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE Id='$id'");

if($query){

    header("Location: daftar.php");

}else{

    echo "Data gagal dihapus";

}

?>