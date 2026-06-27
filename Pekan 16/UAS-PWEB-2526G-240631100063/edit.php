<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn,"SELECT * FROM buku WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){
    mysqli_query($conn,"UPDATE buku SET
        judul='$_POST[judul]',
        penulis='$_POST[penulis]',
        penerbit='$_POST[penerbit]',
        tahun_terbit='$_POST[tahun_terbit]'
        WHERE id=$id");

    header("Location: daftar.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Buku</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Edit Buku</h2>

        <form method="post">
            <input type="text" name="judul" value="<?= $row['judul']; ?>">
            <input type="text" name="penulis" value="<?= $row['penulis']; ?>">
            <input type="text" name="penerbit" value="<?= $row['penerbit']; ?>">
            <input type="number" name="tahun_terbit" value="<?= $row['tahun_terbit']; ?>">

            <button class="btn btn-orange" name="update">Update</button>
        </form>
    </div>
</div>

</body>
</html>
