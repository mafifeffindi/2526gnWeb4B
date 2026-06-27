<?php
include 'koneksi.php';
include 'function.php';

$total = mysqli_query($conn, "SELECT * FROM barang");
$jumlah_barang = mysqli_num_rows($total);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo judulWebsite(); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <?php echo judulWebsite(); ?>
        </a>

        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="index.php">Home</a>
            <a class="nav-link" href="daftar.php">Daftar Barang</a>
            <a class="nav-link" href="tambah.php">Tambah Barang</a>
        </div>
    </div>
</nav>

<div class="container mt-5">

    <div class="text-center">
        <h1><?php echo judulWebsite(); ?></h1>

        <h4><?php echo salam(); ?></h4>

        <p class="lead">
            Kelola data inventaris barang dengan mudah, cepat, dan terorganisir 
            melalui aplikasi berbasis web.
        </p>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5>Total Barang</h5>
                    <h1><?php echo $jumlah_barang; ?></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="daftar.php" class="btn btn-success">Lihat Data Barang</a>
        <a href="tambah.php" class="btn btn-primary">Tambah Barang</a>
    </div>

</div>

</body>
</html>
