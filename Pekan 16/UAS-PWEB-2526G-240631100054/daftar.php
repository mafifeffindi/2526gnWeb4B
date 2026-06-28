<?php

include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

<div class="container">

<a class="navbar-brand" href="index.php">

Sistem Pendataan Mahasiswa

</a>

</div>

</nav>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h4>Daftar Mahasiswa</h4>

</div>

<div class="card-body">

<a href="tambah.php" class="btn btn-success mb-3">

Tambah Data

</a>

<table class="table table-bordered table-striped">

<thead class="table-dark">

<tr>

<th>No</th>

<th>NIM</th>

<th>Nama</th>

<th>Program Studi</th>

<th>Semester</th>

<th>Email</th>

<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

$query=mysqli_query($koneksi,"SELECT * FROM mahasiswa");

while($data=mysqli_fetch_assoc($query)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $data['nim']; ?></td>

<td><?= $data['nama']; ?></td>

<td><?= $data['prodi']; ?></td>

<td><?= $data['semester']; ?></td>

<td><?= $data['email']; ?></td>

<td>

<a href="edit.php?id=<?= $data['id']; ?>" class="btn btn-warning btn-sm">

Edit

</a>

<a href="hapus.php?id=<?= $data['id']; ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus data ini?')">

Hapus

</a>

</td>

</tr>

<?php

}

?>

</tbody>

</table>

<a href="index.php" class="btn btn-secondary">

Kembali

</a>

</div>

</div>

</div>

</body>

</html>