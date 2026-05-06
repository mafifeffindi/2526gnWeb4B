<?php
include 'koneksi.php';

// 1. Ambil filter dari URL (Metode GET) - Sesuai Instruksi Tugas
$filter = isset($_GET['jurusan']) ? $_GET['jurusan'] : "";

// 2. Query SQL
$query = "SELECT * FROM mahasiswa";
if ($filter != "") {
    // Jika ada filter, tambahkan kondisi WHERE
    $query .= " WHERE jurusan = '$filter'";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Daftar Mahasiswa Terdaftar</h2>
            <a href="index.php" class="btn btn-success">+ Tambah Mahasiswa</a>
        </div>

        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <span class="me-2">Filter Jurusan:</span>
                <a href="tampil.php" class="btn btn-sm btn-outline-dark">Semua</a>
                <a href="tampil.php?jurusan=Informatika" class="btn btn-sm btn-outline-primary">Informatika</a>
                <a href="tampil.php?jurusan=Sistem Informasi" class="btn btn-sm btn-outline-primary">Sistem Informasi</a>
                <a href="tampil.php?jurusan=Teknik Komputer" class="btn btn-sm btn-outline-primary">Teknik Komputer</a>
            </div>
        </div>

        <?php if(isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
            <div class="alert alert-success">Data berhasil disimpan!</div>
        <?php endif; ?>

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama (CAPS)</th>
                            <th>Email</th>
                            <th>Jurusan</th>
                            <th>Waktu Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['nama'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td><span class='badge bg-info text-dark'>" . $row['jurusan'] . "</span></td>";
                                echo "<td>" . $row['created_at'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>Belum ada data.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>