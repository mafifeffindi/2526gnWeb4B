<?php
include 'koneksi.php';
include 'functions.php';
$data = mysqli_query($conn, "SELECT * FROM todo");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Daftar Tugas</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Tugas</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['tugas']; ?></td>
                            <td><?= $row['kategori']; ?></td>
							
                            <td>
                                <span class="badge bg-<?= statusBadge($row['status']); ?>">
                                    <?= $row['status']; ?>
                                </span>
                            </td>
							
                            <td>
                                <?= formatTanggal($row['tanggal']); ?>
                            </td>
							
                            <td>
                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
