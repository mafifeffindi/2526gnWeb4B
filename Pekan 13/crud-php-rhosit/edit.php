<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'");

$d = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];

    mysqli_query($koneksi, "UPDATE mahasiswa SET nim='$nim', nama='$nama', prodi='$prodi' WHERE id='$id'");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Data Mahasiswa</title>
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>
    <form action="" method="POST">
        <label for="nim">NIM:</label><br>
        <input type="text" id="nim" name="nim" value="<?php echo $d['nim']; ?>" required><br><br>
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo $d['nama']; ?>" required><br><br>
        <label for="prodi">Prodi:</label><br>
        <input type="text" id="prodi" name="prodi" value="<?php echo $d['prodi']; ?>" required><br><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
