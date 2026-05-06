<?php
include "koneksi.php";
include "functions.php";

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id=$id");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Data</title>
<style>
body {
    font-family: Arial;
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.container {
    width: 400px;
    margin: 80px auto;
    background: white;
    padding: 30px;
    border-radius: 12px;
}

input, select {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
}

button {
    width: 100%;
    padding: 10px;
    background: #667eea;
    color: white;
    border: none;
}

.kembali {
    display: block;
    text-align: center;
    margin-top: 10px;
}
</style>
</head>

<body>
<div class="container">
<h2>Edit Data</h2>

<form action="update.php" method="POST">
<input type="hidden" name="id" value="<?= $row['id'] ?>">

<input type="text" name="nama" value="<?= $row['nama'] ?>">
<input type="text" name="email" value="<?= $row['email'] ?>">

<select name="jurusan">
<?php foreach($jurusan_list as $j) { ?>
<option value="<?= $j ?>" <?= $row['jurusan']==$j ? 'selected' : '' ?>>
<?= $j ?>
</option>
<?php } ?>
</select>

<button type="submit">Update</button>
</form>

<a class="kembali" href="tampil.php">Kembali</a>
</div>
</body>
</html>