<?php
include "koneksi.php";

$jurusan_query = mysqli_query($conn, "SELECT DISTINCT jurusan FROM mahasiswa");

$jurusan = isset($_GET['jurusan']) ? $_GET['jurusan'] : '';

if ($jurusan != '') {
    $query = "SELECT * FROM mahasiswa WHERE jurusan='$jurusan'";
} else {
    $query = "SELECT * FROM mahasiswa";
}

$data = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Data Mahasiswa</h4>
        </div>

        <div class="card-body">

            <!-- FILTER -->
            <form method="GET" class="row g-3 mb-4">
                <div class="col-md-6">
                    <select name="jurusan" class="form-select">
                        <option value="">-- Semua Jurusan --</option>

                        <?php while($j = mysqli_fetch_assoc($jurusan_query)) { ?>
                            <option value="<?= $j['jurusan']; ?>"
                                <?= ($jurusan == $j['jurusan']) ? 'selected' : ''; ?>>
                                <?= $j['jurusan']; ?>
                            </option>
                        <?php } ?>

                    </select>
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Filter</button>
                    <a href="tampil.php" class="btn btn-secondary">Reset</a>
                </div>
            </form>

            <!-- TABEL -->
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jurusan</th>
                    </tr>
                </thead>

                <tbody>
                <?php 
                $no = 1;
                while($row = mysqli_fetch_assoc($data)) { 
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['jurusan']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>

            </table>

            <a href="index.php" class="btn btn-primary">+ Tambah Data</a>

        </div>
    </div>

</div>

</body>
</html>