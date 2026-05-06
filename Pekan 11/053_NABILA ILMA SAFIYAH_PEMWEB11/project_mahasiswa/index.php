<?php
include "functions.php";
$jurusan_list = getJurusan();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Mahasiswa</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            height: 100vh;
            background: linear-gradient(135deg, #3b82f6, #0f172a);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: white;
            padding: 30px;
            width: 360px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: #0f172a;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #334155;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            margin-bottom: 15px;
            outline: none;
        }

        input:focus, select:focus {
            border-color: #3b82f6;
        }

        /* BUTTON TIMBUL */
        button {
            width: 100%;
            padding: 10px;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.2s ease;

            box-shadow: 0 5px 0 #1e40af, 0 8px 15px rgba(0,0,0,0.2);
        }

        button:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 7px 0 #1e40af, 0 12px 20px rgba(0,0,0,0.25);
        }

        button:active {
            transform: translateY(2px);
            box-shadow: 0 2px 0 #1e40af;
        }

        /* LINK BUTTON */
        a {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 12px;
            background: #0f172a;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;

            box-shadow: 0 4px 0 #020617, 0 6px 12px rgba(0,0,0,0.2);
        }

        a:hover {
            transform: translateY(-2px);
        }

        a:active {
            transform: translateY(2px);
        }
    </style>
</head>
<body>

<div class="card">

    <h2>Registrasi Mahasiswa</h2>

    <form action="proses.php" method="POST">
        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Jurusan</label>
        <select name="jurusan" required>
            <option value="">Pilih Jurusan</option>
            <?php foreach($jurusan_list as $j): ?>
                <option value="<?= $j ?>"><?= $j ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Simpan</button>
    </form>

    <a href="tampil.php">Lihat Data</a>

</div>

</body>
</html>