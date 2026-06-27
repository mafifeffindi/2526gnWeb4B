<?php
require 'koneksi.php';

$page_title = 'Edit Mahasiswa';
$breadcrumb = 'Beranda / Daftar / Edit';

// Validasi ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: daftar.php');
    exit;
}

$id = (int) $_GET['id'];

// Ambil data existing
$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id = $id");
if (mysqli_num_rows($query) === 0) {
    header('Location: daftar.php');
    exit;
}
$mhs = mysqli_fetch_assoc($query);

$pesan  = '';
$tipe   = '';
$errors = [];

// Proses POST (Update)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim      = sanitasi($_POST['nim']          ?? '');
    $nama     = sanitasi($_POST['nama']         ?? '');
    $jurusan  = sanitasi($_POST['jurusan']      ?? '');
    $angkatan = sanitasi($_POST['angkatan']     ?? '');
    $jk       = sanitasi($_POST['jenis_kelamin']?? '');
    $email    = sanitasi($_POST['email']        ?? '');
    $no_hp    = sanitasi($_POST['no_hp']        ?? '');
    $alamat   = sanitasi($_POST['alamat']       ?? '');
    $status   = sanitasi($_POST['status']       ?? 'Aktif');

    // Validasi
    if (empty($nim))      $errors[] = 'NIM wajib diisi.';
    if (empty($nama))     $errors[] = 'Nama wajib diisi.';
    if (empty($jurusan))  $errors[] = 'Jurusan wajib diisi.';
    if (empty($angkatan)) $errors[] = 'Angkatan wajib diisi.';
    if (empty($jk))       $errors[] = 'Jenis kelamin wajib dipilih.';

    // Cek NIM duplikat (kecuali diri sendiri)
    if (empty($errors)) {
        $cek = mysqli_query($koneksi, "SELECT id FROM mahasiswa WHERE nim = '$nim' AND id != $id");
        if (mysqli_num_rows($cek) > 0) {
            $errors[] = "NIM <strong>$nim</strong> sudah digunakan oleh mahasiswa lain.";
        }
    }

    if (empty($errors)) {
        $sql = "UPDATE mahasiswa SET
                    nim            = '$nim',
                    nama           = '$nama',
                    jurusan        = '$jurusan',
                    angkatan       = '$angkatan',
                    jenis_kelamin  = '$jk',
                    email          = '$email',
                    no_hp          = '$no_hp',
                    alamat         = '$alamat',
                    status         = '$status'
                WHERE id = $id";

        if (mysqli_query($koneksi, $sql)) {
            header('Location: daftar.php?msg=edit_ok');
            exit;
        } else {
            $pesan = '❌ Gagal memperbarui data. Silakan coba lagi.';
            $tipe  = 'danger';
        }
    } else {
        $pesan = implode('<br>', $errors);
        $tipe  = 'danger';
        // Gunakan data POST untuk re-fill form
        $mhs = array_merge($mhs, [
            'nim' => $nim, 'nama' => $nama, 'jurusan' => $jurusan,
            'angkatan' => $angkatan, 'jenis_kelamin' => $jk,
            'email' => $email, 'no_hp' => $no_hp, 'alamat' => $alamat, 'status' => $status
        ]);
    }
}

require 'header.php';
?>

<?php if ($pesan): ?>
<div class="alert alert-<?= $tipe ?>"><?= $pesan ?></div>
<?php endif; ?>

<div class="card">
    <div class="card-header">
        <h2>✏️ Edit Data Mahasiswa</h2>
        <a href="daftar.php" class="btn btn-outline btn-sm">← Kembali ke Daftar</a>
    </div>
    <div class="card-body">
        <form method="POST" action="edit.php?id=<?= $id ?>">
            <div class="form-grid">

                <div class="form-group">
                    <label>NIM <span class="req">*</span></label>
                    <input type="text" name="nim" value="<?= htmlspecialchars($mhs['nim']) ?>" required>
                </div>

                <div class="form-group">
                    <label>Nama Lengkap <span class="req">*</span></label>
                    <input type="text" name="nama" value="<?= htmlspecialchars($mhs['nama']) ?>" required>
                </div>

                <div class="form-group">
                    <label>Program Studi <span class="req">*</span></label>
                    <input type="text" name="jurusan" value="<?= htmlspecialchars($mhs['jurusan']) ?>" required>
                </div>

                <div class="form-group">
                    <label>Angkatan <span class="req">*</span></label>
                    <input type="number" name="angkatan" value="<?= htmlspecialchars($mhs['angkatan']) ?>" min="2000" max="<?= date('Y') ?>" required>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin <span class="req">*</span></label>
                    <select name="jenis_kelamin" required>
                        <option value="L" <?= $mhs['jenis_kelamin'] === 'L' ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="P" <?= $mhs['jenis_kelamin'] === 'P' ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status">
                        <?php foreach (['Aktif','Cuti','Lulus','DO'] as $s): ?>
                        <option value="<?= $s ?>" <?= $mhs['status'] === $s ? 'selected' : '' ?>><?= $s ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($mhs['email']) ?>">
                </div>

                <div class="form-group">
                    <label>No. HP</label>
                    <input type="tel" name="no_hp" value="<?= htmlspecialchars($mhs['no_hp']) ?>">
                </div>

                <div class="form-group full">
                    <label>Alamat</label>
                    <textarea name="alamat"><?= htmlspecialchars($mhs['alamat']) ?></textarea>
                </div>

            </div>

            <div style="margin-top: 20px; display:flex; gap:10px;">
                <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
                <a href="daftar.php" class="btn btn-outline">Batal</a>
            </div>
        </form>
    </div>
</div>

<?php require 'footer.php'; ?>
