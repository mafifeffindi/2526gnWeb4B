<?php
include "koneksi.php";

$filter = "";
if (isset($_GET['jurusan'])) {
    $jurusan = $_GET['jurusan'];
    $filter = "WHERE jurusan = '$jurusan'";
}

$query = "SELECT * FROM mahasiswa $filter ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            background: linear-gradient(135deg, #3b82f6, #0f172a);
            padding: 30px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: #0f172a;
            margin-bottom: 20px;
        }

        .top {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        /* BUTTON LINK */
        a {
            padding: 6px 10px;
            background: #3b82f6;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            margin-right: 5px;

            box-shadow: 0 4px 0 #1e40af, 0 6px 12px rgba(0,0,0,0.2);
        }

        a:hover {
            transform: translateY(-2px);
        }

        a:active {
            transform: translateY(2px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #0f172a;
            color: white;
            padding: 12px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background: #f8fafc;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Data Mahasiswa</h2>

    <div class="top">
        <a href="index.php">← Kembali</a>
        <div>
<a href="tampil.php?jurusan=Pendidikan Informatika">P. Informatika</a>
<a href="tampil.php?jurusan=Pendidikan Guru PAUD">PG PAUD</a>
<a href="tampil.php?jurusan=Pendidikan Guru Sekolah Dasar">PGSD</a>
<a href="tampil.php?jurusan=Pendidikan Bahasa dan Sastra">PBS</a>
<a href="tampil.php?jurusan=Pendidikan Ilmu Pengetahuan Alam">IPA</a>
        </div>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Tanggal</th>
        </tr>

        <?php $no = 1; ?>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['jurusan'] ?></td>
            <td><?= $row['created_at'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

</div>

</body>
</html>