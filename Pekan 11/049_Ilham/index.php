<?php
require_once 'functions.php';

// Ambil pesan sukses/error dari URL (dikirim proses.php via redirect)
$pesan   = isset($_GET['pesan'])  ? $_GET['pesan']  : '';
$status  = isset($_GET['status']) ? $_GET['status'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f4f8; }
        .card { border-radius: 12px; box-shadow: 0 4px 16px rgba(0,0,0,0.1); }
        .card-header { background: linear-gradient(135deg, #2c3e50, #3498db); border-radius: 12px 12px 0 0 !important; }
        .btn-primary { background: #3498db; border: none; }
        .btn-primary:hover { background: #2980b9; }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header text-white py-3">
                    <h4 class="mb-0 text-center">🎓 Pendaftaran Mahasiswa</h4>
                </div>
                <div class="card-body p-4">

                    <!-- Pesan sukses / error -->
                    <?php if ($pesan !== ''): ?>
                        <div class="alert alert-<?= $status === 'sukses' ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
                            <?= htmlspecialchars($pesan) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Form utama menggunakan method POST -->
                    <form action="proses.php" method="POST" novalidate>

                        <div class="mb-3">
                            <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                   placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   placeholder="contoh@email.com" required>
                        </div>

                        <div class="mb-4">
                            <label for="jurusan" class="form-label fw-semibold">Jurusan</label>
                            <select class="form-select" id="jurusan" name="jurusan" required>
                                <option value="">-- Pilih Jurusan --</option>
                                <?php foreach ($jurusan_list as $j): ?>
                                    <option value="<?= htmlspecialchars($j) ?>"><?= htmlspecialchars($j) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">📨 Daftarkan</button>
                            <a href="tampil.php" class="btn btn-outline-secondary">📋 Lihat Data Mahasiswa</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
