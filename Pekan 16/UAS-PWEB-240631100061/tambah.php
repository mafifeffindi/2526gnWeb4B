<?php
include "koneksi.php";

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "INSERT INTO kontak(nama,no_hp,email,alamat)
    VALUES('$nama','$no_hp','$email','$alamat')");

    echo "<script>
    alert('Data berhasil disimpan');
    window.location='daftar.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kontak</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

<h2>Tambah Kontak</h2>

<form method="POST">

<p>
Nama <br>
<input type="text" name="nama" required>
</p>

<p>
No HP <br>
<input type="text" name="no_hp" required>
</p>

<p>
Email <br>
<input type="email" name="email" required>
</p>

<p>
Alamat <br>
<textarea name="alamat" required></textarea>
</p>

<button type="submit" name="simpan">Simpan</button>

</form>

<br>

<a href="index.php">Kembali ke Home</a>

</div>

</body>
</html>