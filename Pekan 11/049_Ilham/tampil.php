<?php
require_once 'koneksi.php';
require_once 'functions.php';

// =============================================
// PENGGUNAAN METHOD GET: filter berdasarkan jurusan
// Contoh URL: tampil.php?jurusan=Informatika
// =============================================
$filter_jurusan = isset($_GET['jurusan']) ? $_GET['jurusan'] : '';

// Bangun query dengan atau tanpa filter
if (!empty($filter_jurusan) && in_array($filter_jurusan, $jurusan_list)) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM mahasiswa WHERE jurusan = ? ORDER BY created_at DESC");
    mysqli_stmt_bind_param($stmt, "s", $filter_jurusan);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $result = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY created_at DESC");
    $filter_jurusan = ''; // reset jika tidak valid
}

$total = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f4f8; }
        .card { border-radius: 12px; box-shadow: 0 4px 16px rgba(0,0,0,0.1); }
        .card-header { background: linear-gradient(135deg, #2c3e50, #3498db); border-radius: 12px 12px 0 0 !important; }
        .table thead { background-color: #2c3e50; color: white; }
        .badge-jurusan { font-size: 0.85em; }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">
                <div class="card-header text-white py-3 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">📋 Data Mahasiswa Terdaftar</h4>
                    <a href="index.php" class="btn btn-light btn-sm">+ Daftarkan Baru</a>
                </div>
                <div class="card-body p-4">

                    <!-- ===== FILTER JURUSAN (GET) ===== -->
                    <form method="GET" action="tampil.php" class="row g-2 mb-4">
                        <div class="col-auto">
                            <label class="col-form-label fw-semibold">Filter Jurusan:</label>
                        </div>
                        <div class="col-auto">
                            <select name="jurusan" class="form-select">
                                <option value="">-- Semua Jurusan --</option>
                                <?php foreach ($jurusan_list as $j): ?>
                                    <option value="<?= htmlspecialchars($j) ?>"
                                        <?= ($filter_jurusan === $j) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($j) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">🔍 Filter</button>
                            <?php if ($filter_jurusan !== ''): ?>
                                <a href="tampil.php" class="btn btn-outline-secondary">✖ Reset</a>
                            <?php endif; ?>
                        </div>
                    </form>

                    <!-- Info jumlah data -->
                    <p class="text-muted mb-3">
                        Menampilkan <strong><?= $total ?></strong> mahasiswa
                        <?= $filter_jurusan !== '' ? 'dari jurusan <strong>' . htmlspecialchars($filter_jurusan) . '</strong>' : '' ?>
                    </p>

                    <!-- Tabel data -->
                    <?php if ($total > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead>
                                <tr>
                                    <th style="width:50px">#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jurusan</th>
                                    <th>Tanggal Daftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)):
                                    // Warna badge per jurusan
                                    $badge_color = [
                                        'Informatika'     => 'primary',
                                        'Sistem Informasi' => 'success',
                                        'Teknik Komputer' => 'warning text-dark',
                                    ];
                                    $color = isset($badge_color[$row['jurusan']]) ? $badge_color[$row['jurusan']] : 'secondary';
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= htmlspecialchars($row['nama']) ?></td>
                                    <td><?= htmlspecialchars($row['email']) ?></td>
                                    <td>
                                        <span class="badge bg-<?= $color ?> badge-jurusan">
                                            <?= htmlspecialchars($row['jurusan']) ?>
                                        </span>
                                    </td>
                                    <td><?= date('d M Y, H:i', strtotime($row['created_at'])) ?></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                        <div class="alert alert-info text-center">
                            😕 Belum ada data mahasiswa<?= $filter_jurusan !== '' ? ' untuk jurusan ini' : '' ?>.
                        </div>
                    <?php endif; ?>

                </div>
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php mysqli_close($conn); ?>
