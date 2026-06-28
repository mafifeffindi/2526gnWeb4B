<?php
include 'database.php';
include 'navbar.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM kontak WHERE id='$id'"));
?>

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow-lg border-0">

<div class="card-header bg-warning">

<h3>

<i class="fa fa-user-pen"></i>

Edit Kontak

</h3>

</div>

<div class="card-body">

<form action="proses_edit.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?= $data['id']; ?>">

<input type="hidden" name="fotoLama" value="<?= $data['foto']; ?>">

<div class="mb-3">

<label>Nama</label>

<input type="text" class="form-control" name="nama" value="<?= $data['nama']; ?>" required>

</div>

<div class="mb-3">

<label>No HP</label>

<input type="text" class="form-control" name="no_hp" value="<?= $data['no_hp']; ?>" required>

</div>

<div class="mb-3">

<label>Email</label>

<input type="email" class="form-control" name="email" value="<?= $data['email']; ?>" required>

</div>

<div class="mb-3">

<label>Alamat</label>

<textarea class="form-control" name="alamat" rows="4"><?= $data['alamat']; ?></textarea>

</div>

<div class="mb-3">

<label>Kategori</label>

<select class="form-select" name="kategori">

<option <?= $data['kategori']=="Teman"?"selected":""; ?>>Teman</option>

<option <?= $data['kategori']=="Keluarga"?"selected":""; ?>>Keluarga</option>

<option <?= $data['kategori']=="Kantor"?"selected":""; ?>>Kantor</option>

<option <?= $data['kategori']=="Bisnis"?"selected":""; ?>>Bisnis</option>

<option <?= $data['kategori']=="Lainnya"?"selected":""; ?>>Lainnya</option>

</select>

</div>

<div class="mb-3">

<label>Foto Lama</label><br>

<img src="assets/upload/<?= $data['foto']; ?>" width="120" class="rounded-circle">

</div>

<div class="mb-3">

<label>Ganti Foto</label>

<input type="file" class="form-control" name="foto">

</div>

<button class="btn btn-warning">

<i class="fa fa-save"></i>

Update

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