<?php
include 'fungsi.php';

if(isset($_POST['simpan'])){

    tambah($_POST);

    echo "<script>
    alert('Data berhasil ditambahkan');
    document.location='daftar.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container mt-5">

<div class="card p-4 shadow">

<h2 class="mb-4">📚 Tambah Buku</h2>

<form method="POST">

<div class="mb-3">
<label>Judul Buku</label>
<input type="text" name="judul" class="form-control" required>
</div>

<div class="mb-3">
<label>Penulis</label>
<input type="text" name="penulis" class="form-control" required>
</div>

<div class="mb-3">
<label>Penerbit</label>
<input type="text" name="penerbit" class="form-control" required>
</div>

<div class="mb-3">
<label>Tahun</label>
<input type="number" name="tahun" class="form-control" required>
</div>

<button class="btn btn-success" name="simpan">Simpan</button>

<a href="index.php" class="btn btn-secondary">Kembali</a>

</form>

</div>

</div>

</body>
</html>