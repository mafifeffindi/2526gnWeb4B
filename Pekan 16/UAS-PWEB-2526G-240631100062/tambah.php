<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Tambah Tugas</h3>
                <form action="simpan.php" method="POST">
                    <div class="mb-3">
                        <label>Tugas</label>
                        <input type="text" name="tugas" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Kategori</label>
                        <input type="text" name="kategori" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option>Selesai</option>
                            <option>Belum Selesai</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control">
                    </div>

                    <button class="btn btn-primary">
                        Simpan
                    </button>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
