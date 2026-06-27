<?php
require 'koneksi.php';

$page_title = 'Beranda';
$breadcrumb = 'Beranda';

// Hitung statistik menggunakan function
$total       = totalMahasiswa();
$statistik   = statistikStatus();

$aktif  = isset($statistik['Aktif'])  ? $statistik['Aktif']  : 0;
$cuti   = isset($statistik['Cuti'])   ? $statistik['Cuti']   : 0;
$lulus  = isset($statistik['Lulus'])  ? $statistik['Lulus']  : 0;
$do     = isset($statistik['DO'])     ? $statistik['DO']     : 0;

// Ambil 5 mahasiswa terbaru
$query  = "SELECT * FROM mahasiswa ORDER BY created_at DESC LIMIT 5";
$result = mysqli_query($koneksi, $query);

require 'header.php';
?>

<!-- STAT CARDS -->
<div class="stat-grid">
    <div class="stat-card">
        <div class="stat-icon blue">🎓</div>
        <div class="stat-info">
            <p>Total Mahasiswa</p>
            <h3><?= $total ?></h3>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green">✅</div>
        <div class="stat-info">
            <p>Aktif</p>
            <h3><?= $aktif ?></h3>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon yellow">⏸️</div>
        <div class="stat-info">
            <p>Cuti</p>
            <h3><?= $cuti ?></h3>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon blue">🏅</div>
        <div class="stat-info">
            <p>Lulus</p>
            <h3><?= $lulus ?></h3>
        </div>
    </div>
</div>

<!-- TABEL MAHASISWA TERBARU -->
<div class="card">
    <div class="card-header">
        <h2>📋 Mahasiswa Terbaru</h2>
        <a href="daftar.php" class="btn btn-primary btn-sm">Lihat Semua</a>
    </div>
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Angkatan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            if (mysqli_num_rows($result) > 0):
                while ($row = mysqli_fetch_assoc($result)):
                    // Percabangan untuk badge status
                    $badge_status = 'badge-aktif';
                    if ($row['status'] === 'Cuti')  $badge_status = 'badge-cuti';
                    if ($row['status'] === 'Lulus') $badge_status = 'badge-lulus';
                    if ($row['status'] === 'DO')    $badge_status = 'badge-do';
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><strong><?= htmlspecialchars($row['nim']) ?></strong></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['jurusan']) ?></td>
                    <td><?= $row['angkatan'] ?></td>
                    <td><span class="badge <?= $badge_status ?>"><?= $row['status'] ?></span></td>
                    <td>
                        <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-outline btn-sm">👁 Detail</a>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">✏️ Edit</a>
                    </td>
                </tr>
            <?php
                endwhile;
            else:
            ?>
                <tr>
                    <td colspan="7">
                        <div class="empty-state">
                            <div class="emoji">📭</div>
                            <h3>Belum ada data</h3>
                            <p>Silakan tambahkan data mahasiswa terlebih dahulu.</p>
                        </div>
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require 'footer.php'; ?>
