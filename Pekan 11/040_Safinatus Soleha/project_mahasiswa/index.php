<?php include "functions.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>
</head>
<body>

<h2>Form Pendaftaran Mahasiswa</h2>

<form action="proses.php" method="POST">
    Nama:<br>
    <input type="text" name="nama" required><br><br>

    Email:<br>
    <input type="text" name="email" required><br><br>

    Jurusan:<br>
    <select name="jurusan">
        <?php foreach ($jurusan_list as $j) { ?>
            <option value="<?= $j ?>"><?= $j ?></option>
        <?php } ?>
    </select><br><br>

    <button type="submit">Simpan</button>
</form>

<br>
<a href="tampil.php">Lihat Data</a>

</body>
</html>