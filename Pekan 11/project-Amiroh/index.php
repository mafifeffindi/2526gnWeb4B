<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "functions.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            margin: 0;
        }

        .container {
            width: 400px;
            margin: 80px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #667eea;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #5a67d8;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #667eea;
            font-weight: bold;
        }

        a:hover {
            color: #5a67d8;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Mahasiswa</h2>

    <form action="proses.php" method="POST">
        Nama:
        <input type="text" name="nama" required>

        Email:
        <input type="text" name="email" required>

        Jurusan:
        <select name="jurusan">
            <?php foreach($jurusan_list as $j) { ?>
                <option value="<?= $j ?>"><?= $j ?></option>
            <?php } ?>
        </select>

        <button type="submit">Simpan</button>
    </form>

    <a href="tampil.php">Lihat Data</a>
</div>

</body>
</html>