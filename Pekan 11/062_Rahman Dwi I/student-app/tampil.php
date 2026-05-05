<?php
include 'koneksi.php';

// Ambil filter jurusan (GET)
$filter = isset($_GET['jurusan']) ? $_GET['jurusan'] : '';

$query = "SELECT * FROM mahasiswa";

if ($filter != '') {
    $query .= " WHERE jurusan='$filter'";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>

<h2>Data Mahasiswa</h2>

<!-- Filter GET -->
<form method="GET">
    Filter Jurusan:
    <select name="jurusan">
        <option value="">Semua</option>
        <option value="Informatika">Informatika</option>
        <option value="Sistem Informasi">Sistem Informasi</option>
        <option value="Teknik Komputer">Teknik Komputer</option>
    </select>
    <button type="submit">Filter</button>
</form>

<br>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>

    <?php $no = 1; ?>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['jurusan'] ?></td>
    </tr>
    <?php endwhile; ?>

</table>

<br>
<a href="index.php">Kembali ke Form</a>

</body>
</html>
