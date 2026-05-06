<?php include 'functions.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Student Registration Mini App</h4>
                    </div>
                    <div class="card-body">
                        <form action="proses.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="contoh@mail.com" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jurusan</label>
                                <select name="jurusan" class="form-select">
                                    <?php 
                                    // Menggunakan Array dari functions.php
                                    foreach($jurusan_list as $j) {
                                        echo "<option value='$j'>$j</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
                                <a href="tampil.php" class="btn btn-outline-secondary">Lihat Daftar Mahasiswa</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>