<?php
include "koneksi.php";

$where = "";

// filter GET
if (isset($_GET['jurusan'])) {
    $jurusan = $_GET['jurusan'];
    $where = "WHERE jurusan='$jurusan'";
}

$query = "SELECT * FROM mahasiswa $where";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>

<h2>Data Mahasiswa</h2>

<a href="index.php">Tambah Data</a><br><br>

Filter:
<a href="tampil.php">Semua</a> |
<a href="tampil.php?jurusan=Informatika">Informatika</a> |
<a href="tampil.php?jurusan=Sistem Informasi">Sistem Informasi</a> |
<a href="tampil.php?jurusan=Teknik Komputer">Teknik Komputer</a>

<br><br>

<table border="1" cellpadding="10">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Jurusan</th>
</tr>

<?php $no=1; while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['jurusan'] ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>