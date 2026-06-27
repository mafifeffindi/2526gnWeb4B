<?php
require 'koneksi.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: daftar.php');
    exit;
}

$id    = (int) $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id = $id");

if (mysqli_num_rows($query) === 0) {
    header('Location: daftar.php');
    exit;
}

$mhs = mysqli_fetch_assoc($query);

$page_title = 'Detail Mahasiswa';
$breadcrumb = 'Beranda / Daftar / Detail';

// Badge status
$badge_status = 'badge-aktif';
if ($mhs['status'] === 'Cuti')  $badge_status = 'badge-cuti';
if ($mhs['status'] === 'Lulus') $badge_status = 'badge-lulus';
if ($mhs['status'] === 'DO')    $badge_status = 'badge-do';

require 'header.php';
?>

<div class="card">
    <div class="card-header">
        <h2>👁 Detail Mahasiswa</h2>
        <div style="display:flex; gap:8px;">
            <a href="edit.php?id=<?= $id ?>" class="btn btn-warning btn-sm">✏️ Edit</a>
            <a href="hapus.php?id=<?= $id ?>" class="btn btn-danger btn-sm btn-hapus">🗑️ Hapus</a>
            <a href="daftar.php" class="btn btn-outline btn-sm">← Kembali</a>
        </div>
    </div>
    <div class="card-body">

        <!-- Avatar & nama besar -->
        <div style="display:flex; align-items:center; gap:20px; margin-bottom:28px; padding-bottom:24px; border-bottom:1px solid var(--border);">
            <div style="width:72px; height:72px; border-radius:50%; background:#dbeafe; display:flex; align-items:center; justify-content:center; font-size:32px; flex-shrink:0;">
                <?= $mhs['jenis_kelamin'] === 'L' ? '👨‍🎓' : '👩‍🎓' ?>
            </div>
            <div>
                <h2 style="font-size:20px; margin-bottom:4px;"><?= htmlspecialchars($mhs['nama']) ?></h2>
                <p style="color:var(--muted); font-size:14px;"><?= htmlspecialchars($mhs['nim']) ?> &bull; <?= htmlspecialchars($mhs['jurusan']) ?></p>
                <span class="badge <?= $badge_status ?>" style="margin-top:6px;"><?= $mhs['status'] ?></span>
            </div>
        </div>

        <!-- Detail grid -->
        <div class="detail-grid">
            <div class="detail-item">
                <label>NIM</label>
                <p><?= htmlspecialchars($mhs['nim']) ?></p>
            </div>
            <div class="detail-item">
                <label>Nama Lengkap</label>
                <p><?= htmlspecialchars($mhs['nama']) ?></p>
            </div>
            <div class="detail-item">
                <label>Program Studi</label>
                <p><?= htmlspecialchars($mhs['jurusan']) ?></p>
            </div>
            <div class="detail-item">
                <label>Angkatan</label>
                <p><?= $mhs['angkatan'] ?></p>
            </div>
            <div class="detail-item">
                <label>Jenis Kelamin</label>
                <p><?= $mhs['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan' ?></p>
            </div>
            <div class="detail-item">
                <label>Status</label>
                <p><span class="badge <?= $badge_status ?>"><?= $mhs['status'] ?></span></p>
            </div>
            <div class="detail-item">
                <label>Email</label>
                <p><?= !empty($mhs['email']) ? htmlspecialchars($mhs['email']) : '<span style="color:var(--muted)">-</span>' ?></p>
            </div>
            <div class="detail-item">
                <label>No. HP</label>
                <p><?= !empty($mhs['no_hp']) ? htmlspecialchars($mhs['no_hp']) : '<span style="color:var(--muted)">-</span>' ?></p>
            </div>
            <div class="detail-item" style="grid-column: 1 / -1;">
                <label>Alamat</label>
                <p><?= !empty($mhs['alamat']) ? nl2br(htmlspecialchars($mhs['alamat'])) : '<span style="color:var(--muted)">-</span>' ?></p>
            </div>
            <div class="detail-item">
                <label>Terdaftar Sejak</label>
                <p><?= formatTanggal($mhs['created_at']) ?></p>
            </div>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>
