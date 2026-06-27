<?php
include "config/koneksi.php";

$cari = "";

if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $data = mysqli_query($conn,"SELECT * FROM buku
    WHERE judul LIKE '%$cari%'
    OR penulis LIKE '%$cari%'
    OR penerbit LIKE '%$cari%'");
}else{
    $data = mysqli_query($conn,"SELECT * FROM buku");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Daftar Buku</title>

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

<a href="tambah.php" class="btn btn-warning">
Tambah Buku
</a>

</div>

</div>

</nav>

<div class="container mt-5">

<div class="card p-4">

<div class="d-flex justify-content-between">

<h3>📚 Daftar Buku</h3>

<form class="d-flex" method="GET">

<input
type="text"
name="cari"
class="form-control me-2"
placeholder="Cari buku..."
value="<?= $cari; ?>">

<button class="btn btn-primary">
Cari
</button>

</form>

</div>

<hr>

<table class="table table-hover table-bordered">

<thead class="table-primary">

<tr>

<th>No</th>

<th>Judul</th>

<th>Penulis</th>

<th>Penerbit</th>

<th>Tahun</th>

<th width="170">
Aksi
</th>

</tr>

</thead>

<tbody>

<?php
$no=1;

while($d=mysqli_fetch_array($data)){
?>

<tr>

<td><?= $no++; ?></td>

<td><?= $d['judul']; ?></td>

<td><?= $d['penulis']; ?></td>

<td><?= $d['penerbit']; ?></td>

<td><?= $d['tahun']; ?></td>

<td>

<a href="edit.php?id=<?= $d['id']; ?>"
class="btn btn-warning btn-sm">

<i class="fa fa-pen"></i>

Edit

</a>

<a href="hapus.php?id=<?= $d['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus data?')">

<i class="fa fa-trash"></i>

Hapus

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>
</html>