<?php
include 'koneksi.php';

if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $data = mysqli_query($conn, "SELECT * FROM barang WHERE nama_barang LIKE '%$cari%'");
} else {
    $data = mysqli_query($conn, "SELECT * FROM barang");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">Daftar Inventaris Barang</h2>

    <a href="index.php" class="btn btn-secondary mb-3">Home</a>
    <a href="tambah.php" class="btn btn-primary mb-3">Tambah Barang</a>

    <form method="GET" class="mb-3">
        <div class="input-group">
            <input
                type="text"
                name="cari"
                class="form-control"
                placeholder="Cari nama barang..."
                value="<?php if(isset($_GET['cari'])) echo $_GET['cari']; ?>"
            >

            <button type="submit" class="btn btn-success">
                Cari
            </button>

            <a href="daftar.php" class="btn btn-secondary">
                Reset
            </a>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        <?php
        $no = 1;

        while($row = mysqli_fetch_assoc($data)){
        ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['kode_barang']; ?></td>
            <td><?= $row['nama_barang']; ?></td>
            <td><?= $row['kategori']; ?></td>
            <td><?= $row['jumlah']; ?></td>
            <td><?= $row['kondisi']; ?></td>
            <td><?= $row['lokasi']; ?></td>

            <td>
                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <a href="hapus.php?id=<?= $row['id']; ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin ingin menghapus data?')">
                    Hapus
                </a>
            </td>

        </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

</body>
</html>
