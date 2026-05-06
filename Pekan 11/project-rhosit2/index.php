<?php include "functions.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Form Input Mahasiswa</h4>
        </div>

        <div class="card-body">

            <form action="proses.php" method="POST">

                <!-- Nama -->
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama">
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Masukkan email">
                </div>

                <!-- Jurusan -->
                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <select name="jurusan" class="form-select">
                        <?php foreach($jurusan_list as $j) { ?>
                            <option value="<?= $j ?>"><?= $j ?></option>
                        <?php } ?>
                    </select>
                </div>

                <!-- Tombol -->
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="tampil.php" class="btn btn-primary">Lihat Data</a>

            </form>

        </div>
    </div>

</div>

</body>
</html>