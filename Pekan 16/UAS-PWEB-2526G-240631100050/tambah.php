<?php
require 'koneksi.php';

$page_title = 'Tambah Mahasiswa';
$breadcrumb = 'Beranda / Tambah Mahasiswa';

$pesan   = '';
$tipe    = '';
$errors  = [];

// Proses POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ambil & sanitasi input
    $nim        = sanitasi($_POST['nim'] ?? '');
    $nama       = sanitasi($_POST['nama'] ?? '');
    $jurusan    = sanitasi($_POST['jurusan'] ?? '');
    $angkatan   = sanitasi($_POST['angkatan'] ?? '');
    $jk         = sanitasi($_POST['jenis_kelamin'] ?? '');
    $email      = sanitasi($_POST['email'] ?? '');
    $no_hp      = sanitasi($_POST['no_hp'] ?? '');
    $alamat     = sanitasi($_POST['alamat'] ?? '');
    $status     = sanitasi($_POST['status'] ?? 'Aktif');

    // Validasi
    if (empty($nim))       $errors[] = 'NIM wajib diisi.';
    if (empty($nama))      $errors[] = 'Nama wajib diisi.';
    if (empty($jurusan))   $errors[] = 'Jurusan wajib diisi.';
    if (empty($angkatan))  $errors[] = 'Angkatan wajib diisi.';
    if (empty($jk))        $errors[] = 'Jenis kelamin wajib dipilih.';

    // Cek NIM duplikat
    if (empty($errors)) {
        $cek = mysqli_query($koneksi, "SELECT id FROM mahasiswa WHERE nim = '$nim'");
        if (mysqli_num_rows($cek) > 0) {
            $errors[] = "NIM <strong>$nim</strong> sudah terdaftar.";
        }
    }

    // Simpan ke database
    if (empty($errors)) {
        $sql = "INSERT INTO mahasiswa (nim, nama, jurusan, angkatan, jenis_kelamin, email, no_hp, alamat, status)
                VALUES ('$nim', '$nama', '$jurusan', '$angkatan', '$jk', '$email', '$no_hp', '$alamat', '$status')";

        if (mysqli_query($koneksi, $sql)) {
            $pesan = "✅ Data mahasiswa <strong>$nama</strong> berhasil ditambahkan!";
            $tipe  = 'success';
            // Reset form
            $nim = $nama = $jurusan = $angkatan = $jk = $email = $no_hp = $alamat = '';
            $status = 'Aktif';
        } else {
            $pesan = '❌ Gagal menyimpan data. Silakan coba lagi.';
            $tipe  = 'danger';
        }
    } else {
        $pesan = implode('<br>', $errors);
        $tipe  = 'danger';
    }
}

require 'header.php';
?>

<?php if ($pesan): ?>
<div class="alert alert-<?= $tipe ?>">
    <?= $pesan ?>
</div>
<?php endif; ?>

<div class="card">
    <div class="card-header">
        <h2>➕ Form Tambah Mahasiswa</h2>
        <a href="daftar.php" class="btn btn-outline btn-sm">← Kembali ke Daftar</a>
    </div>
    <div class="card-body">
        <form method="POST" action="tambah.php">
            <div class="form-grid">

                <div class="form-group">
                    <label>NIM <span class="req">*</span></label>
                    <input type="text" name="nim" value="<?= isset($nim) ? htmlspecialchars($nim) : '' ?>" placeholder="Contoh: 240631100050" required>
                </div>

                <div class="form-group">
                    <label>Nama Lengkap <span class="req">*</span></label>
                    <input type="text" name="nama" value="<?= isset($nama) ? htmlspecialchars($nama) : '' ?>" placeholder="Nama lengkap mahasiswa" required>
                </div>

                <div class="form-group">
                    <label>Program Studi <span class="req">*</span></label>
                    <input type="text" name="jurusan" value="<?= isset($jurusan) ? htmlspecialchars($jurusan) : '' ?>" placeholder="Contoh: Pendidikan Informatika" required>
                </div>

                <div class="form-group">
                    <label>Angkatan <span class="req">*</span></label>
                    <input type="number" name="angkatan" value="<?= isset($angkatan) ? htmlspecialchars($angkatan) : date('Y') ?>" min="2000" max="<?= date('Y') ?>" required>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin <span class="req">*</span></label>
                    <select name="jenis_kelamin" required>
                        <option value="">-- Pilih --</option>
                        <option value="L" <?= (isset($jk) && $jk === 'L') ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="P" <?= (isset($jk) && $jk === 'P') ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status">
                        <?php
                        $statuses = ['Aktif', 'Cuti', 'Lulus', 'DO'];
                        foreach ($statuses as $s):
                        ?>
                        <option value="<?= $s ?>" <?= (isset($status) && $status === $s) ? 'selected' : ($s === 'Aktif' ? 'selected' : '') ?>><?= $s ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>" placeholder="email@utm.ac.id">
                </div>

                <div class="form-group">
                    <label>No. HP</label>
                    <input type="tel" name="no_hp" value="<?= isset($no_hp) ? htmlspecialchars($no_hp) : '' ?>" placeholder="08xxxxxxxxxx">
                </div>

                <div class="form-group full">
                    <label>Alamat</label>
                    <textarea name="alamat" placeholder="Alamat lengkap mahasiswa"><?= isset($alamat) ? htmlspecialchars($alamat) : '' ?></textarea>
                </div>

            </div><!-- end form-grid -->

            <div style="margin-top: 20px; display: flex; gap: 10px;">
                <button type="submit" class="btn btn-primary">💾 Simpan Data</button>
                <button type="reset"  class="btn btn-outline">🔄 Reset Form</button>
            </div>
        </form>
    </div>
</div>

<?php require 'footer.php'; ?>
