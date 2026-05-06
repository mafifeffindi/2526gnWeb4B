<?php
include 'koneksi.php';

$filter = "";

if (isset($_GET['jurusan'])) {
    $jurusan = $_GET['jurusan'];
    $filter = "WHERE jurusan='$jurusan'";
}

$query = "SELECT * FROM mahasiswa $filter";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>

<h2>Data Mahasiswa</h2>

<!-- Filter -->
<form method="GET">
    <select name="jurusan">
        <option value="">-- Filter Jurusan --</option>
        <option value="Pendidikan Informatika">Informatika</option>
        <option value="Sistem Informasi">Sistem Informasi</option>
        <option value="Teknik Komputer">Teknik Komputer</option>
    </select>
    <button type="submit">Filter</button>
</form>

<br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
        <th>Tanggal</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['jurusan']; ?></td>
        <td><?= $row['created_at']; ?></td>
    </tr>
    <?php endwhile; ?>

</table>

<br>
<a href="index.php">Kembali ke Form</a>

</body>
</html>