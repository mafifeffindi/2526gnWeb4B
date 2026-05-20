<?php
include 'koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Data Mahasiswa</h2>
    <a href="tambah.php" class="btn-tambah">+ Tambah Data</a>
    <table>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        if (mysqli_num_rows($data) > 0) {
            while ($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($d['nim']); ?></td>
            <td><?php echo htmlspecialchars($d['nama']); ?></td>
            <td><?php echo htmlspecialchars($d['prodi']); ?></td>
            <td>
                <a href="edit.php?id=<?php echo $d['id']; ?>" class="btn-edit">Edit</a>
                <a href="hapus.php?id=<?php echo $d['id']; ?>" class="btn-hapus" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php
            }
        } else {
            echo '<tr><td colspan="5" class="empty-msg">Belum ada data mahasiswa.</td></tr>';
        }
        ?>
    </table>
</div>
</body>
</html>
