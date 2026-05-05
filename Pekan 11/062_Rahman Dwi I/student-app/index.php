<?php include 'functions.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>
</head>
<body>

<h2>Form Pendaftaran Mahasiswa</h2>

<form method="POST" action="proses.php">
    Nama: <br>
    <input type="text" name="nama" required><br><br>

    Email: <br>
    <input type="email" name="email" required><br><br>

    Jurusan: <br>
    <select name="jurusan">
        <?php foreach($jurusan_list as $j): ?>
            <option value="<?= $j ?>"><?= $j ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Daftar</button>
</form>

<br>
<a href="tampil.php">Lihat Data Mahasiswa</a>

</body>
</html>