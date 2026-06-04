<?php
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$keyword = "";
if (isset($_GET['cari'])) {
    $keyword = mysqli_real_escape_string($koneksi, $_GET['keyword']);
    $query = "SELECT * FROM mahasiswa WHERE 
              nim LIKE '%$keyword%' OR 
              nama LIKE '%$keyword%' OR 
              prodi LIKE '%$keyword%'";
} else {
    $query = "SELECT * FROM mahasiswa ORDER BY id DESC";
}

$data = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #121214;
            color: #e4e4e7;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar-modern {
            background-color: #1a1a1e;
            border-bottom: 2px solid #00f0ff;
        }
        .dashboard-card {
            border: 1px solid #2d2d34;
            border-radius: 16px;
            background-color: #1e1e24;
            box-shadow: 0 10px 25px rgba(0,0,0,0.5);
        }
        .table-modern th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            color: #00f0ff;
            background-color: #1a1a1e;
            border-color: #2d2d34;
            padding: 15px;
        }
        .table-modern td {
            padding: 15px;
            color: #ffffff !important;
            background-color: #1e1e24;
            border-color: #2d2d34;
            font-size: 0.9rem;
        }
        .table-striped>tbody>tr:nth-of-type(odd)>* {
            background-color: #25252b !important;
            color: #ffffff !important;
        }
        .form-control-search {
            background-color: #2a2a35;
            border: 1px solid #3f3f46;
            color: #ffffff;
        }
        .form-control-search:focus {
            background-color: #2a2a35;
            border-color: #00f0ff;
            color: #ffffff;
            box-shadow: 0 0 0 3px rgba(0, 240, 255, 0.2);
        }
        .form-control-search::placeholder {
            color: #9a9aaa !important;
            opacity: 1;
        }
        footer {
            background-color: #1a1a1e;
            color: #71717a;
            border-top: 1px solid #2d2d34;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark navbar-modern py-3">
        <div class="container">
            <span class="navbar-brand fw-bold m-0 text-white" style="letter-spacing: 0.5px;">SISTEM INFORMASI DATA MAHASISWA</span>
            <a href="logout.php" class="btn btn-outline-danger btn-sm px-3 fw-medium" style="border-radius: 6px;">Keluar (Logout)</a>
        </div>
    </nav>

    <main class="container my-4 flex-grow-1">
        <div class="card dashboard-card p-4">
            <div class="row g-3 justify-content-between align-items-center mb-4">
                <div class="col-md-4">
                    <a href="tambah.php" class="btn btn-success fw-bold px-4 py-2" style="border-radius: 8px; background-color: #0d9488; border: none; color: #ffffff;">+ Tambah Data Baru</a>
                </div>
                <div class="col-md-6">
                    <form method="GET" action="" class="input-group">
                        <input type="text" name="keyword" class="form-control form-control-search px-3" placeholder="Cari berdasarkan NIM, nama, prodi..." value="<?php echo htmlspecialchars($keyword); ?>" autocomplete="off" style="border-radius: 8px 0 0 8px;">
                        <button class="btn btn-secondary px-4 fw-bold" type="submit" name="cari" style="border-radius: 0 8px 8px 0; background-color: #1a1a1e; border:none; color: #00f0ff;">Cari</button>
                        <?php if (isset($_GET['cari'])) : ?>
                            <a href="index.php" class="btn btn-outline-light ms-2 fw-medium" style="border-radius: 8px;">Reset</a>
                        <?php endif; ?>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-modern table-striped align-middle">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th>NIM</th>
                            <th>Nama Lengkap</th>
                            <th>Program Studi</th>
                            <th>Email</th>
                            <th>No. Handphone</th>
                            <th width="15%" class="text-center">Aksi Manajemen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if (mysqli_num_rows($data) > 0) {
                            while ($d = mysqli_fetch_array($data)) {
                        ?>
                        <tr>
                            <td class="text-center fw-medium style-data" style="color: #cbd5e1 !important;"><?php echo $no++; ?></td>
                            <td class="font-monospace text-info fw-bold"><?php echo htmlspecialchars($d['nim']); ?></td>
                            <td class="fw-bold text-white"><?php echo htmlspecialchars($d['nama']); ?></td>
                            <td><?php echo htmlspecialchars($d['prodi']); ?></td>
                            <td class="fw-medium"><?php echo htmlspecialchars($d['email']); ?></td>
                            <td><?php echo htmlspecialchars($d['no_hp']); ?></td>
                            <td class="text-center">
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="edit.php?id=<?php echo $d['id']; ?>" class="btn btn-sm text-white px-3 fw-semibold" style="background-color: #d97706; border: none; border-radius: 6px;">Edit</a>
                                    <a href="hapus.php?id=<?php echo $d['id']; ?>" class="btn btn-sm btn-hapus text-white px-3 fw-semibold" data-nama="<?php echo htmlspecialchars($d['nama']); ?>" style="background-color: #dc2626; border: none; border-radius: 6px;">Hapus</a>
                                </div>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center py-4 text-muted border-color-3c3c3c'>Data tidak ditemukan atau masih kosong.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer class="py-3 text-center">
        <div class="container">
            <small>&copy; 2026 Universitas Trunodjoyo Madura. All Rights Reserved.</small>
        </div>
    </footer>

    <script>
        const tombolHapus = document.querySelectorAll('.btn-hapus');
        tombolHapus.forEach(tombol => {
            tombol.addEventListener('click', function(event) {
                event.preventDefault();
                const urlTarget = this.getAttribute('href');
                const namaMahasiswa = this.getAttribute('data-nama');
                
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: `Data mahasiswa bernama "${namaMahasiswa}" akan dihapus permanen dari sistem!`,
                    icon: 'warning',
                    background: '#1e1e24',
                    color: '#e4e4e7',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#2d2d34',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = urlTarget;
                    }
                });
            });
        });
    </script>
</body>
</html>