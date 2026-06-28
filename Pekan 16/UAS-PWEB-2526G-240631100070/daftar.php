<?php
include "koneksi.php";
$data = mysqli_query($koneksi,"SELECT * FROM kontak");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kontak</title>

    <style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    min-height:100vh;
    background:linear-gradient(135deg,#6a11cb,#2575fc);
    padding:40px;
}

.container{
    width:95%;
    max-width:1200px;
    margin:auto;
    background:rgba(255,255,255,.15);
    backdrop-filter:blur(15px);
    border-radius:20px;
    padding:30px;
    box-shadow:0 8px 30px rgba(0,0,0,.3);
    border:1px solid rgba(255,255,255,.3);
}

h2{
    color:white;
    text-align:center;
    margin-bottom:30px;
    font-size:35px;
}

.btn{
    display:inline-block;
    background:white;
    color:#2575fc;
    padding:12px 22px;
    text-decoration:none;
    border-radius:10px;
    font-weight:bold;
    transition:.3s;
}

.btn:hover{
    background:#2575fc;
    color:white;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
    overflow:hidden;
    border-radius:15px;
}

th{
    background:rgba(255,255,255,.25);
    color:white;
    padding:15px;
}

td{
    background:rgba(255,255,255,.10);
    color:white;
    padding:15px;
    text-align:center;
}

tr:hover td{
    background:rgba(255,255,255,.20);
}

.edit{
    color:#00ffae;
    text-decoration:none;
    font-weight:bold;
}

.hapus{
    color:#ff6b6b;
    text-decoration:none;
    font-weight:bold;
}

.edit:hover,
.hapus:hover{
    text-decoration:underline;
}

    </style>

</head>

<body>

<div class="container">

<h2>📒 Daftar Kontak</h2>

<a href="tambah.php" class="btn">+ Tambah Kontak</a>

<table>

<tr>
    <th>No</th>
    <th>Nama</th>
    <th>No HP</th>
    <th>Email</th>
    <th>Alamat</th>
    <th>Aksi</th>
</tr>

<?php
$no=1;
while($d=mysqli_fetch_array($data)){
?>

<tr>

<td><?php echo $no++; ?></td>

<td><?php echo $d['nama']; ?></td>

<td><?php echo $d['nohp']; ?></td>

<td><?php echo $d['email']; ?></td>

<td><?php echo $d['alamat']; ?></td>

<td>
<a class="edit" href="edit.php?id=<?php echo $d['id'];?>">✏ Edit</a>
|
<a class="hapus" href="hapus.php?id=<?php echo $d['id'];?>">🗑 Hapus</a>
</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>