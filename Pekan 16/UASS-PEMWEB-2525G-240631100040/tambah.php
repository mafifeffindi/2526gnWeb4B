<?php
include 'database.php';
include 'navbar.php';
?>

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow-lg border-0">

<div class="card-header bg-success text-white">

<h3>

<i class="fa fa-user-plus"></i>

Tambah Kontak

</h3>

</div>

<div class="card-body">

<form action="proses_tambah.php" method="POST" enctype="multipart/form-data">

<div class="mb-3">

<label>Nama</label>

<input
type="text"
name="nama"
class="form-control"
required>

</div>

<div class="mb-3">

<label>No HP</label>

<input
type="text"
name="no_hp"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Alamat</label>

<textarea
name="alamat"
class="form-control"
rows="4"
required></textarea>

</div>

<div class="mb-3">

<label>Kategori</label>

<select
name="kategori"
class="form-select">

<option>Teman</option>

<option>Keluarga</option>

<option>Kantor</option>

<option>Bisnis</option>

<option>Lainnya</option>

</select>

</div>

<div class="mb-3">

<label>Foto</label>

<input
type="file"
name="foto"
class="form-control">

</div>

<button class="btn btn-success">

<i class="fa fa-save"></i>

Simpan

</button>

<a href="daftar.php" class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

</div>

<?php include 'footer.php'; ?>