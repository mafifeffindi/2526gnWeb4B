<?php include 'functions.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>
</head>
<body>

<h2>Form Input Mahasiswa</h2>

<form action="proses.php" method="POST">
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Jurusan:</label><br>
    <select name="jurusan">
        <?php foreach ($jurusan_list as $j) : ?>
            <option value="<?= $j; ?>"><?= $j; ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Simpan</button>
</form>

<br>
<a href="tampil.php">Lihat Data</a>

</body>
</html>
