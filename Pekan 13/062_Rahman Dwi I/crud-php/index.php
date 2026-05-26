<?php
include 'koneksi.php';

if(!isset($_SESSION['login'])){
    header("Location: login.php");
}

$cari = "";

if(isset($_GET['cari'])){
    $cari = $_GET['cari'];

    $query = mysqli_query($conn,
    "SELECT * FROM mahasiswa
    WHERE nama LIKE '%$cari%'
    OR nim LIKE '%$cari%'
    OR jurusan LIKE '%$cari%'");
}else{
    $query = mysqli_query($conn,
    "SELECT * FROM mahasiswa");
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>DATA MAHASISWA</h2>

<div class="top-bar">
    <a href="tambah.php" class="btn">+ Tambah Data</a>

    <a href="logout.php" class="btn-logout">Logout</a>
</div>

<form method="GET" class="search-box">
    <input type="text" name="cari"
    placeholder="Cari data..."
    value="<?= $cari ?>">

    <button type="submit">Cari</button>
</form>

<div class="table-wrapper">
<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Jurusan</th>
        <th>Email</th>
        <th>No HP</th>
        <th>Aksi</th>
    </tr>

<?php
$no = 1;

while($row = mysqli_fetch_assoc($query)){
?>

<tr>
    <td><?= $no++ ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['nim'] ?></td>
    <td><?= $row['jurusan'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['no_hp'] ?></td>

    <td>
        <a href="edit.php?id=<?= $row['id'] ?>" class="edit">
            Edit
        </a>

        <a href="hapus.php?id=<?= $row['id'] ?>"
        class="hapus"
        onclick="return confirm('Yakin ingin menghapus data?')">
            Hapus
        </a>
    </td>
</tr>

<?php } ?>

</table>
</div>
</div>

</body>
</html>