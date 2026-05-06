<?php
include "koneksi.php";
$data = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Mahasiswa</title>
<style>
body { font-family: Arial; background: #eef2ff; }

.container {
    width: 85%;
    margin: 40px auto;
    background: white;
    padding: 25px;
    border-radius: 12px;
}

h2 { text-align: center; }

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th {
    background: #667eea;
    color: white;
}

th, td {
    padding: 12px;
    text-align: center;
}

tr:nth-child(even) {
    background: #f4f4f4;
}

.btn {
    padding: 6px 12px;
    border-radius: 5px;
    color: white;
    text-decoration: none;
    margin: 2px;
}

.edit { background: orange; }
.hapus { background: red; }
.kembali {
    display: inline-block;
    margin-top: 15px;
    background: #667eea;
}
</style>
</head>

<body>
<div class="container">
<h2>Data Mahasiswa</h2>

<table>
<tr>
<th>Nama</th>
<th>Email</th>
<th>Jurusan</th>
<th>Aksi</th>
</tr>

<?php while($row = mysqli_fetch_assoc($data)) { ?>
<tr>
<td><?= $row['nama'] ?></td>
<td><?= $row['email'] ?></td>
<td><?= $row['jurusan'] ?></td>
<td>
<a class="btn edit" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
<a class="btn hapus" href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
</td>
</tr>
<?php } ?>

</table>

<a class="btn kembali" href="index.php">Kembali</a>
</div>
</body>
</html>