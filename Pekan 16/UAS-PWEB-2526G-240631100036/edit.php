<?php

include "koneksi.php";


$id=$_GET['id'];


$data=mysqli_query($conn,
"SELECT * FROM tb_buku WHERE id_buku='$id'");


$row=mysqli_fetch_assoc($data);



if(isset($_POST['update'])){


mysqli_query($conn,

"UPDATE tb_buku SET

judul='$_POST[judul]',
penulis='$_POST[penulis]',
penerbit='$_POST[penerbit]',
tahun='$_POST[tahun]',
kategori='$_POST[kategori]',
stok='$_POST[stok]'

WHERE id_buku='$id'

");


header("location:index.php");

}

?>


<!DOCTYPE html>

<html>

<head>

<link rel="stylesheet" href="style.css">

</head>


<body>


<div class="container">


<h2>Edit Buku</h2>


<form method="POST">


<input name="judul" value="<?= $row['judul'];?>">


<input name="penulis" value="<?= $row['penulis'];?>">


<input name="penerbit" value="<?= $row['penerbit'];?>">


<input name="tahun" value="<?= $row['tahun'];?>">


<input name="kategori" value="<?= $row['kategori'];?>">


<input name="stok" value="<?= $row['stok'];?>">


<button name="update">
Update
</button>


</form>


</div>


</body>

</html>
