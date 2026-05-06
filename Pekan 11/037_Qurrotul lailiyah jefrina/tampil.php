<?php
include 'koneksi.php';

if (isset($_GET['jurusan'])) {
    $jurusan = $_GET['jurusan'];
    $query = "SELECT * FROM mahasiswa WHERE jurusan='$jurusan'";
} else {
    $query = "SELECT * FROM mahasiswa";
}

$result = mysqli_query($conn, $query);
?>

<h2>Data Mahasiswa</h2>

<a href="tampil.php">Semua</a> |
<a href="tampil.php?jurusan=Informatika">Informatika</a> |
<a href="tampil.php?jurusan=Sistem Informasi">Sistem Informasi</a> |
<a href="tampil.php?jurusan=Teknik Komputer">Teknik Komputer</a>

<br><br>

<table border="1" cellpadding="10">
<tr>
    <th>Nama</th>
    <th>Email</th>
    <th>Jurusan</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['jurusan'] ?></td>
</tr>
<?php } ?>

</table>

<br>
<a href="index.php">Kembali ke Form</a>