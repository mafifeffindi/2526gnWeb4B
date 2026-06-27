<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM todo WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?= $row['id']; ?>">
            <div class="mb-3">
                <label>Tugas</label>
                <input type="text" name="tugas" class="form-control"
                    value="<?= $row['tugas']; ?>">
            </div>
			
            <div class="mb-3">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control"
                    value="<?= $row['kategori']; ?>">
            </div>

            <div class="mb-3">
                <label>Status</label>
                <input type="text" name="status" class="form-control"
                    value="<?= $row['status']; ?>">
            </div>

            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control"
                    value="<?= $row['tanggal']; ?>">
            </div>

            <button class="btn btn-success">
                Update
            </button>

        </form>
    </div>
</body>
</html>
