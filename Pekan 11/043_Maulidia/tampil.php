<?php
include "koneksi.php";

$jurusan = isset($_GET['jurusan']) ? $_GET['jurusan'] : '';

if ($jurusan != '') {
    $query = "SELECT * FROM mahasiswa WHERE jurusan='$jurusan'";
} else {
    $query = "SELECT * FROM mahasiswa";
}

$data = mysqli_query($conn, $query);
?>

<h2>Data Mahasiswa</h2>

<form method="GET">
    Filter Jurusan:
    <input type="text" name="jurusan">
    <button type="submit">Filter</button>
</form>

<br>

<table border="1">
<tr>
    <th>Nama</th>
    <th>Email</th>
    <th>Jurusan</th>
</tr>

<?php while($row = mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['jurusan'] ?></td>
</tr>
<?php } ?>
</table>

<br>
<a href="index.php">Kembali</a>