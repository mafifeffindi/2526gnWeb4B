<?php
include "config/koneksi.php";

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
        WHERE id='$id'
    ");

    echo "<script>
    alert('Data berhasil diupdate!');
    window.location='daftar.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Buku</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<nav class="navbar navbar-expand-lg">

<div class="container">

<a class="navbar-brand" href="index.php">
<i class="fa-solid fa-book-open"></i>
Sistem Pendataan Buku
</a>

<div class="ms-auto">

<a href="index.php" class="btn btn-light">
Home
</a>

<a href="daftar.php" class="btn btn-success">
Daftar Buku
</a>

</div>

</div>

</nav>

<div class="container mt-5">

<div class="card p-4">

<h3 class="mb-4">
✏️ Edit Buku
</h3>

<form method="POST">

<div class="mb-3">

<label class="form-label">
Judul Buku
</label>

<input
type="text"
name="judul"
class="form-control"
value="<?= $d['judul']; ?>"
required>

</div>

<div class="mb-3">

<label class="form-label">
Penulis
</label>

<input
type="text"
name="penulis"
class="form-control"
value="<?= $d['penulis']; ?>"
required>

</div>

<div class="mb-3">

<label class="form-label">
Penerbit
</label>

<input
type="text"
name="penerbit"
class="form-control"
value="<?= $d['penerbit']; ?>"
required>

</div>

<div class="mb-3">

<label class="form-label">
Tahun Terbit
</label>

<input
type="number"
name="tahun"
class="form-control"
value="<?= $d['tahun']; ?>"
required>

</div>

<button
type="submit"
name="update"
class="btn btn-warning">

<i class="fa fa-pen"></i>

Update Data

</button>

<a href="daftar.php" class="btn btn-secondary">

Kembali

</a>

</form>

</div>

<div class="footer">

<hr>

© 2026 | UAS Pemrograman Web

</div>

</div>

</body>
</html>