<?php
include 'koneksi.php';

$id   = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'");
$d    = mysqli_fetch_array($data);

if (isset($_POST['update'])) {
    $nim   = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $prodi = mysqli_real_escape_string($koneksi, $_POST['prodi']);

    mysqli_query($koneksi, "UPDATE mahasiswa SET nim='$nim', nama='$nama', prodi='$prodi' WHERE id='$id'");
    header("location:index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Edit Data Mahasiswa</h2>
    <form method="post">
        <div class="form-group">
            <label>NIM</label>
            <input type="text" name="nim" value="<?php echo htmlspecialchars($d['nim']); ?>" required>
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="<?php echo htmlspecialchars($d['nama']); ?>" required>
        </div>
        <div class="form-group">
            <label>Prodi</label>
            <input type="text" name="prodi" value="<?php echo htmlspecialchars($d['prodi']); ?>" required>
        </div>
        <button type="submit" name="update">Update</button>
    </form>
    <a href="index.php" class="btn-back">← Kembali ke Daftar</a>
</div>
</body>
</html>
