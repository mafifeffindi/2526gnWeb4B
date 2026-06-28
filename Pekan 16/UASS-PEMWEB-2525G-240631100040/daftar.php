<?php
include 'database.php';
include 'navbar.php';

$cari = "";

if(isset($_GET['cari'])){
    $cari = bersihkan($_GET['cari']);

    $query = mysqli_query($conn,"SELECT * FROM kontak
    WHERE nama LIKE '%$cari%'
    OR no_hp LIKE '%$cari%'
    OR email LIKE '%$cari%'
    ORDER BY id DESC");

}else{

    $query = mysqli_query($conn,"SELECT * FROM kontak ORDER BY id DESC");

}
?>

<div class="card shadow-lg border-0">

<div class="card-header bg-primary text-white">

<div class="d-flex justify-content-between align-items-center">

<h4>
<i class="fa-solid fa-address-book"></i>
Daftar Kontak
</h4>

<a href="tambah.php" class="btn btn-light">

<i class="fa fa-plus"></i>

Tambah

</a>

</div>

</div>

<div class="card-body">

<form method="GET">

<div class="input-group mb-4">

<input
type="text"
name="cari"
class="form-control"
placeholder="Cari Nama / Nomor HP / Email..."
value="<?= $cari ?>">

<button class="btn btn-primary">

<i class="fa fa-search"></i>

Cari

</button>

</div>

</form>

<table class="table table-hover align-middle">

<thead class="table-dark">

<tr>

<th>No</th>

<th>Foto</th>

<th>Nama</th>

<th>No HP</th>

<th>Email</th>

<th>Kategori</th>

<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

while($data=mysqli_fetch_assoc($query)){

?>

<tr>

<td><?= $no++ ?></td>

<td>

<img
src="assets/upload/<?= $data['foto']; ?>"
width="60"
height="60"
style="object-fit:cover;border-radius:50%;">

</td>

<td><?= $data['nama']; ?></td>

<td><?= $data['no_hp']; ?></td>

<td><?= $data['email']; ?></td>

<td>

<span class="badge bg-success">

<?= $data['kategori']; ?>

</span>

</td>

<td>

<a
href="edit.php?id=<?= $data['id']; ?>"
class="btn btn-warning btn-sm">

<i class="fa fa-edit"></i>

</a>

<a
href="hapus.php?id=<?= $data['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus data ini?')">

<i class="fa fa-trash"></i>

</a>

</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

</div>

<?php include 'footer.php'; ?>