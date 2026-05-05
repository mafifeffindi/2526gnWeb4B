<?php include 'functions.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5 bg-light">
    <div class="container card p-4 shadow-sm" style="max-width: 500px;">
        <h2 class="text-center mb-4">Pendaftaran Mahasiswa</h2>
        <form action="proses.php" method="POST"> <!-- Menggunakan POST sesuai tugas[cite: 1] -->
            <div class="mb-3">
                <label>Nama:</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Jurusan:</label>
                <select name="jurusan" class="form-select" required>
                    <?php foreach ($jurusan_list as $j): ?>
                        <option value="<?= $j ?>"><?= $j ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" name="simpan" class="btn btn-primary w-100">Simpan Data</button>
        </form>
    </div>
</body>
</html>
