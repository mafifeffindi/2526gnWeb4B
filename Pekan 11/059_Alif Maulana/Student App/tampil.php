<?php 
include 'koneksi.php'; 
include 'functions.php';

// Fitur Filter menggunakan GET[cite: 1]
$jurusan_filter = isset($_GET['jurusan']) ? $_GET['jurusan'] : '';
$query = "SELECT * FROM mahasiswa";
if ($jurusan_filter != '') {
    $query .= " WHERE jurusan = '$jurusan_filter'";
}
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <h3>Data Mahasiswa</h3>
    <form action="tampil.php" method="GET" class="mb-3 d-flex gap-2">
        <select name="jurusan" class="form-select w-25">
            <option value="">Semua Jurusan</option>
            <?php foreach ($jurusan_list as $j): ?>
                <option value="<?= $j ?>"><?= $j ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-secondary">Filter</button>
    </form>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr><th>Nama</th><th>Email</th><th>Jurusan</th></tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['jurusan'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-success">Tambah Data Baru</a>
</body>
</html>
