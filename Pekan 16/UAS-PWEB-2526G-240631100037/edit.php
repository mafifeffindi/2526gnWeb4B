<?php
include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM buku WHERE id='$id'");
$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];

    mysqli_query($conn,"UPDATE buku SET
        judul='$judul',
        penulis='$penulis',
        penerbit='$penerbit',
        tahun='$tahun'
        WHERE id='$id'");

    echo "<script>
        alert('Data berhasil diubah');
        window.location='daftar.php';
    </script>";
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

<h2>✏️ Edit Buku</h2>

<form method="POST">

<label>Judul Buku</label>
<input type="text" name="judul" value="<?= $d['judul']; ?>" required>

<label>Penulis</label>
<input type="text" name="penulis" value="<?= $d['penulis']; ?>" required>

<label>Penerbit</label>
<input type="text" name="penerbit" value="<?= $d['penerbit']; ?>" required>

<label>Tahun</label>
<input type="number" name="tahun" value="<?= $d['tahun']; ?>" required>

<br><br>

<button type="submit" name="update" class="btn">Update</button>

<a href="daftar.php" class="btn">Kembali</a>

</form>

</div>

</body>
</html>