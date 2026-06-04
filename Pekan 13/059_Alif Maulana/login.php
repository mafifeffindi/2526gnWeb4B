<?php
include 'koneksi.php';

$error = '';
$notif_sukses = '';

if (isset($_GET['status']) && $_GET['status'] === 'register_sukses') {
    $notif_sukses = 'Registrasi akun berhasil! Silakan masuk.';
}

if (isset($_POST['login'])) {
    if (isset($conn) && $conn !== null) {
        $username = mysqli_real_escape_string($conn, trim($_POST['username']));
        $password = trim($_POST['password']);

        if (!empty($username) && !empty($password)) {
            $query = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if (password_verify($password, $row['password'])) {
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $row['username'];
                    header("Location: index.php");
                    exit;
                } else {
                    $error = 'Password yang Anda masukkan salah!';
                }
            } else {
                $error = 'Username tidak ditemukan!';
            }
        } else {
            $error = 'Semua kolom pendaftaran wajib diisi!';
        }
    } else {
        $error = 'Sistem mendeteksi konfigurasi variabel database ($conn) belum siap.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Akademik - Masuk</title>
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
        .login-container {
            background-color: #1e1e24;
            border: 1px solid #2d2d34;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
        }
        .login-header {
            background: linear-gradient(135deg, #005fad, #00f0ff);
            padding: 30px;
            text-align: center;
            color: #ffffff;
        }
        .form-label-custom {
            color: #f4f4f5 !important;
            font-weight: 500;
        }
        .form-control-modern {
            border-radius: 8px;
            padding: 12px 15px;
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
            <h6 class="m-0 fw-bold text-white" style="letter-spacing: 1px;">PORTAL OTENTIKASI AKADEMIK DIGITAL</h6>
        </div>
    </header>

    <main class="main-content container">
        <div class="login-container">
            <div class="login-header">
                <h4 class="fw-bold m-0">Sistem Academic</h4>
                <p class="text-white-50 small m-0 mt-1">Portal Akses Informasi Mahasiswa</p>
            </div>
            <div class="p-4">
                <?php if (!empty($notif_sukses)): ?>
                    <div class="alert alert-success bg-success bg-opacity-10 text-success border-0 small text-center" role="alert"><?= $notif_sukses; ?></div>
                <?php endif; ?>
                
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger bg-danger bg-opacity-10 text-danger border-0 small text-center" role="alert"><?= $error; ?></div>
                <?php endif; ?>

                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label small form-label-custom">Username</label>
                        <input type="text" name="username" class="form-control form-control-modern" placeholder="Username Anda" required autocomplete="off">
                    </div>
                    <div class="mb-4">
                        <label class="form-label small form-label-custom">Password</label>
                        <input type="password" name="password" class="form-control form-control-modern" placeholder="Password Anda" required>
                    </div>
                    <div class="d-grid mb-3">
                        <button type="submit" name="login" class="btn btn-primary p-2 fw-bold text-white" style="border-radius: 8px; background-color: #007acc; border:none;">Masuk ke Sistem</button>
                    </div>
                    <div class="text-center mt-3" style="position: relative; z-index: 10;">
                        <span style="color: #a1a1aa;" class="small">Belum punya akun? </span>
                        <a href="register.php" class="small text-decoration-none fw-bold" style="color: #00f0ff; position: relative; z-index: 20;">Registrasi di Sini</a>
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