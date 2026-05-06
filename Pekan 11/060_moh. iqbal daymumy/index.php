<?php include "functions.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title>Form Mahasiswa</title>
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
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}
h2 { text-align: center; }

input, select {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 6px;
    border: 1px solid #ccc;
}

button {
    width: 100%;
    padding: 12px;
    background: #667eea;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

button:hover { background: #5a67d8; }

.link {
    text-align: center;
    margin-top: 15px;
}
a { text-decoration: none; color: #667eea; }
</style>
</head>

<body>
<div class="container">
<h2>Form Mahasiswa</h2>

<form action="proses.php" method="POST">
    <input type="text" name="nama" placeholder="Masukkan Nama">
    <input type="text" name="email" placeholder="Masukkan Email">

    <select name="jurusan">
        <?php foreach($jurusan_list as $j) { ?>
        <option value="<?= $j ?>"><?= $j ?></option>
        <?php } ?>
    </select>

    <button type="submit">Simpan</button>
</form>

<div class="link">
    <a href="tampil.php">Lihat Data</a>
</div>
</div>
</body>
</html>