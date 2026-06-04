<?php
include 'koneksi.php';

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

$pesan = "";
$status = "";

if (isset($_POST['submit_register'])) {
    $username = mysqli_real_escape_string($koneksi, trim($_POST['username']));
    $password = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    if ($password !== $konfirmasi_password) {
        $pesan = "Konfirmasi password tidak cocok!";
        $status = "danger";
    } else {
        $cek_user = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");
        
        if (mysqli_num_rows($cek_user) > 0) {
            $pesan = "Username sudah digunakan, cari nama lain!";
            $status = "danger";
        } else {
            $password_enkripsi = password_hash($password, PASSWORD_DEFAULT);
            $query_input = "INSERT INTO users (username, password) VALUES ('$username', '$password_enkripsi')";
            
            if (mysqli_query($koneksi, $query_input)) {
                header("Location: login.php?status=register_sukses");
                exit;
            } else {
                $pesan = "Gagal melakukan registrasi, terjadi kesalahan sistem.";
                $status = "danger";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Akademik - Daftar Akun</title>
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
        .header-nav {
            background-color: #1a1a1e;
            border-bottom: 2px solid #00f0ff;
        }
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 0;
        }
        .register-container {
            background-color: #1e1e24;
            border: 1px solid #2d2d34;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
        }
        .register-header {
            background: linear-gradient(135deg, #0d9488, #00f0ff);
            padding: 25px;
            text-align: center;
            color: #ffffff;
        }
        .form-label-custom {
            color: #f4f4f5 !important;
            font-weight: 500;
        }
        .form-control-modern {
            border-radius: 8px;
            padding: 11px 15px;
            border: 1px solid #3f3f46;
            background-color: #2a2a35;
            color: #ffffff;
        }
        .form-control-modern:focus {
            background-color: #2a2a35;
            border-color: #00f0ff;
            color: #ffffff;
            box-shadow: 0 0 0 3px rgba(0, 240, 255, 0.2);
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

    <header class="header-nav py-3">
        <div class="container text-center">
            <h6 class="m-0 fw-bold text-white" style="letter-spacing: 1px;">SISTEM REGISTRASI AKADEMIK DIGITAL</h6>
        </div>
    </header>

    <main class="main-content container">
        <div class="register-container">
            <div class="register-header">
                <h5 class="fw-bold m-0">Daftar Akun</h5>
                <p class="text-white-50 small m-0 mt-1">Lengkapi kredensial untuk akses sistem</p>
            </div>
            <div class="p-4">
                <?php if (!empty($pesan)) : ?>
                    <div class="alert alert-danger bg-danger bg-opacity-10 text-danger border-0 text-center small mb-3" role="alert">
                        <?php echo $pesan; ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="username" class="form-label small form-label-custom">Username Baru</label>
                        <input type="text" name="username" id="username" class="form-control form-control-modern" placeholder="Buat Username Baru" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label small form-label-custom">Password</label>
                        <input type="password" name="password" id="password" class="form-control form-control-modern" placeholder="Buat Password" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small form-label-custom">Konfirmasi Password</label>
                        <input type="password" name="konfirmasi_password" class="form-control form-control-modern" placeholder="Ulangi Password" required>
                    </div>
                    <div class="d-grid mb-2">
                        <button type="submit" name="submit_register" class="btn btn-primary p-2 fw-semibold text-white" style="border-radius: 8px; background-color: #0d9488; border:none;">Daftar Sekarang</button>
                    </div>
                    <div class="text-center mt-3" style="position: relative; z-index: 10;">
                        <small style="color: #a1a1aa;">Sudah punya akun? <a href="login.php" class="text-decoration-none fw-semibold" style="color: #00f0ff; position: relative; z-index: 20;">Login di sini</a></small>
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