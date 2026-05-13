<?php include "functions.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-body">
            <h3 class="text-center mb-4">🎓 Form Pendaftaran Mahasiswa</h3>

            <form action="proses.php" method="POST">
                
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <select name="jurusan" class="form-select">
                        <?php
                        foreach (getJurusan() as $j) {
                            echo "<option value='$j'>$j</option>";
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">Daftar</button>
            </form>

            <div class="text-center mt-3">
                <a href="tampil.php" class="btn btn-outline-secondary btn-sm">
                    Lihat Data Mahasiswa
                </a>
            </div>

        </div>
    </div>
</div>

</body>
</html>