<?php
include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM kontak WHERE id='$id'");
$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

    $nama   = $_POST['nama'];
    $no_hp  = $_POST['no_hp'];
    $email  = $_POST['email'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "UPDATE kontak SET
        nama='$nama',
        no_hp='$no_hp',
        email='$email',
        alamat='$alamat'
        WHERE id='$id'
    ");

    echo "<script>
    alert('Data berhasil diubah');
    window.location='daftar.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Kontak</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

<h2>Edit Kontak</h2>

<form method="POST">

<p>
Nama <br>
<input type="text" name="nama" value="<?= $d['nama']; ?>" required>
</p>

<p>
No HP <br>
<input type="text" name="no_hp" value="<?= $d['no_hp']; ?>" required>
</p>

<p>
Email <br>
<input type="email" name="email" value="<?= $d['email']; ?>" required>
</p>

<p>
Alamat <br>
<textarea name="alamat" required><?= $d['alamat']; ?></textarea>
</p>

<button type="submit" name="update">Update</button>

</form>

<br>

<a href="daftar.php">Kembali</a>

</div>

</body>
</html>