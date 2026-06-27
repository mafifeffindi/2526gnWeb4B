<?php
require 'koneksi.php';

$page_title = 'Daftar Mahasiswa';
$breadcrumb = 'Beranda / Daftar Mahasiswa';

// Pesan session via GET
$pesan = '';
$tipe  = '';
if (isset($_GET['msg'])) {
    if ($_GET['msg'] === 'hapus_ok') { $pesan = '✅ Data mahasiswa berhasil dihapus.';   $tipe = 'success'; }
    if ($_GET['msg'] === 'edit_ok')  { $pesan = '✅ Data mahasiswa berhasil diperbarui.'; $tipe = 'success'; }
}

// --- PENCARIAN (GET) ---
$search  = '';
$filter  = '';
$where   = '';

if (!empty($_GET['search'])) {
    $search = sanitasi($_GET['search']);
    $where .= " AND (nim LIKE '%$search%' OR nama LIKE '%$search%' OR jurusan LIKE '%$search%')";
}

if (!empty($_GET['filter_status'])) {
    $filter = sanitasi($_GET['filter_status']);
    $where .= " AND status = '$filter'";
}

// --- PAGINATION ---
$per_page    = 10;
$page        = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset      = ($page - 1) * $per_page;

$count_query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM mahasiswa WHERE 1=1 $where");
$count_row   = mysqli_fetch_assoc($count_query);
$total_data  = $count_row['total'];
$total_pages = ceil($total_data / $per_page);

$query  = "SELECT * FROM mahasiswa WHERE 1=1 $where ORDER BY created_at DESC LIMIT $per_page OFFSET $offset";
$result = mysqli_query($koneksi, $query);

require 'header.php';
?>

<?php if ($pesan): ?>
<div class="alert alert-<?= $tipe ?>"><?= $pesan ?></div>
<?php endif; ?>

<div class="card">
    <div class="card-header">
        <h2>📋 Daftar Mahasiswa (<?= $total_data ?> data)</h2>
        <a href="tambah.php" class="btn btn-primary btn-sm">➕ Tambah Mahasiswa</a>
    </div>

    <!-- SEARCH & FILTER -->
    <div style="padding: 14px 20px; border-bottom: 1px solid var(--border); background: #f8fafc;">
        <form method="GET" action="daftar.php" class="search-bar" style="flex-wrap:wrap; gap:8px;">
            <input type="text" name="search" placeholder="🔍 Cari NIM, nama, atau jurusan..." value="<?= htmlspecialchars($search) ?>" style="width:280px;">
            <select name="filter_status" style="width:140px; padding:7px 12px; border:1.5px solid var(--border); border-radius:7px; font-size:14px;">
                <option value="">Semua Status</option>
                <?php foreach (['Aktif','Cuti','Lulus','DO'] as $s): ?>
                <option value="<?= $s ?>" <?= $filter === $s ? 'selected' : '' ?>><?= $s ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="btn btn-primary btn-sm">Cari</button>
            <?php if ($search || $filter): ?>
            <a href="daftar.php" class="btn btn-outline btn-sm">✕ Reset</a>
            <?php endif; ?>
        </form>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Angkatan</th>
                    <th>JK</th>
                    <th>Status</th>
                    <th>Terdaftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $no = $offset + 1;
            if (mysqli_num_rows($result) > 0):
                while ($row = mysqli_fetch_assoc($result)):
                    // Percabangan badge status
                    $badge_status = 'badge-aktif';
                    if ($row['status'] === 'Cuti')  $badge_status = 'badge-cuti';
                    if ($row['status'] === 'Lulus') $badge_status = 'badge-lulus';
                    if ($row['status'] === 'DO')    $badge_status = 'badge-do';

                    $badge_jk = $row['jenis_kelamin'] === 'L' ? 'badge-l' : 'badge-p';
                    $label_jk = $row['jenis_kelamin'] === 'L' ? 'L' : 'P';
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><strong><?= htmlspecialchars($row['nim']) ?></strong></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['jurusan']) ?></td>
                    <td><?= $row['angkatan'] ?></td>
                    <td><span class="badge <?= $badge_jk ?>"><?= $label_jk ?></span></td>
                    <td><span class="badge <?= $badge_status ?>"><?= $row['status'] ?></span></td>
                    <td><?= formatTanggal($row['created_at']) ?></td>
                    <td style="white-space:nowrap;">
                        <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-outline btn-sm">👁</a>
                        <a href="edit.php?id=<?= $row['id'] ?>"   class="btn btn-warning btn-sm">✏️</a>
                        <a href="hapus.php?id=<?= $row['id'] ?>"  class="btn btn-danger btn-sm btn-hapus">🗑️</a>
                    </td>
                </tr>
            <?php
                endwhile;
            else:
            ?>
                <tr>
                    <td colspan="9">
                        <div class="empty-state">
                            <div class="emoji">🔍</div>
                            <h3>Data tidak ditemukan</h3>
                            <p>Coba kata kunci lain atau tambahkan data baru.</p>
                        </div>
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- PAGINATION -->
    <?php if ($total_pages > 1): ?>
    <div style="padding: 12px 20px;">
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?= $page-1 ?>&search=<?= urlencode($search) ?>&filter_status=<?= urlencode($filter) ?>">‹ Prev</a>
            <?php else: ?>
                <span class="disabled">‹ Prev</span>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <?php if ($i === $page): ?>
                    <span class="active"><?= $i ?></span>
                <?php else: ?>
                    <a href="?page=<?= $i ?>&search=<?= urlencode($search) ?>&filter_status=<?= urlencode($filter) ?>"><?= $i ?></a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
                <a href="?page=<?= $page+1 ?>&search=<?= urlencode($search) ?>&filter_status=<?= urlencode($filter) ?>">Next ›</a>
            <?php else: ?>
                <span class="disabled">Next ›</span>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php require 'footer.php'; ?>
