<?php
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['simpan'])) {
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $prodi = mysqli_real_escape_string($koneksi, $_POST['prodi']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    
    $query = "INSERT INTO mahasiswa (nim, nama, prodi, email, no_hp) VALUES ('$nim', '$nama', '$prodi', '$email', '$no_hp')";
    mysqli_query($koneksi, $query);
    
    header("location:index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #121214;
            color: #e4e4e7;
            height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        .navbar-modern {
            background-color: #1a1a1e;
            border-bottom: 2px solid #38ef7d;
        }
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5px 0;
        }
        .form-card {
            border: 1px solid #2d2d34;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.5);
            overflow: hidden;
            background-color: #1e1e24;
            width: 100%;
            max-width: 480px;
        }
        .form-header {
            background: linear-gradient(135deg, #059669, #38ef7d);
            color: #ffffff;
            padding: 12px 20px;
        }
        .form-label-custom {
            color: #f4f4f5 !important;
            font-weight: 500;
        }
        .form-control-modern {
            border-radius: 8px;
            padding: 8px 14px;
            border: 1px solid #3f3f46;
            background-color: #2a2a35;
            color: #ffffff;
        }
        .form-control-modern:focus {
            border-color: #38ef7d;
            box-shadow: 0 0 0 3px rgba(56, 239, 125, 0.2);
            background-color: #2a2a35;
            color: #ffffff;
        }
        .form-control-modern::placeholder {
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
        <div class="container justify-content-center">
            <span class="navbar-brand fw-bold m-0 text-white">FORM MANAJEMEN INPUT MAHASISWA</span>
        </div>
    </nav>

    <main class="main-content container">
        <div class="card form-card">
            <div class="form-header">
                <h6 class="fw-bold m-0">Form Tambah Data Mahasiswa</h6>
            </div>
            <div class="card-body p-3">
                <form method="POST" action="">
                    <div class="mb-2">
                        <label class="form-label small form-label-custom">NIM</label>
                        <input type="text" name="nim" class="form-control form-control-modern" placeholder="Masukkan NIM Mahasiswa" required autocomplete="off">
                    </div>
                    <div class="mb-2">
                        <label class="form-label small form-label-custom">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control form-control-modern" placeholder="Masukkan Nama Lengkap" required autocomplete="off">
                    </div>
                    <div class="mb-2">
                        <label class="form-label small form-label-custom">Program Studi</label>
                        <input type="text" name="prodi" class="form-control form-control-modern" placeholder="Masukkan Program Studi" required autocomplete="off">
                    </div>
                    <div class="mb-2">
                        <label class="form-label small form-label-custom">Alamat Email</label>
                        <input type="email" name="email" class="form-control form-control-modern" placeholder="nama@contoh.com" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small form-label-custom">Nomor Handphone</label>
                        <input type="text" name="no_hp" class="form-control form-control-modern" placeholder="Contoh: 0878xxxxxxxx" required autocomplete="off">
                    </div>
                    <div class="d-flex justify-content-between align-items-center" style="position: relative; z-index: 10;">
                        <a href="index.php" class="btn btn-outline-light btn-sm px-3" style="border-radius: 6px; position: relative; z-index: 20;">Kembali</a>
                        <button type="submit" name="simpan" class="btn btn-success btn-sm px-4 fw-bold text-white" style="border-radius: 6px; background-color: #059669; border: none; position: relative; z-index: 20;">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer class="py-3 text-center">
        <div class="container">
            <small>&copy; 2026 Universitas Trunodjoyo Madura. All Rights Reserved.</small>
        </div>
    </footer>

</body>
</html>