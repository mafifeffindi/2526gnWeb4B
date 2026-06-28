<?php

include "koneksi.php";


$id=$_GET['id'];


mysqli_query($conn,
"DELETE FROM tb_buku WHERE id_buku='$id'");


header("location:index.php");


?>
