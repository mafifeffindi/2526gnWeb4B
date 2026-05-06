<?php
require "koneksi.php";

$query = "SELECT * FROM mahasiswa";
$data = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial;
            background: linear-gradient(to right, #667eea, #764ba2);
            margin: 0;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #667eea;
            color: white;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f2f2f2;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            text-decoration: none;
        }

        .hapus {
            background: #e74c3c;
        }

        .hapus:hover {
            background: #c0392b;
        }

        .back {
            display: inline-block;
            margin-top: 15px;
            background: #667eea;
            padding: 8px 15px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }

        .back:hover {
            background: #5a67d8;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Mahasiswa</h2>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; ?>
        <?php while($row = mysqli_fetch_assoc($data)) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['jurusan'] ?></td>
            <td>
                <a href="hapus.php?id=<?= $row['id'] ?>" 
                   class="btn hapus"
                   onclick="return confirm('Yakin mau hapus data ini?')">
                   Hapus
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <a href="index.php" class="back">← Kembali</a>
</div>

</body>
</html>

   