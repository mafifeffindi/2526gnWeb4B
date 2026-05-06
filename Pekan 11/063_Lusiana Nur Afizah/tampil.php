<?php 
require 'functions.php';
// Mengambil data dari database menggunakan fungsi yang sudah kamu buat
$mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa - Student Registration App</title>
    <!-- Google Fonts & Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-grad: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            --accent: #6366f1;
            --text-dark: #1e293b;
            --bg-light: #f1f5f9;
        }

        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background: var(--bg-light);
            background-image: 
                radial-gradient(at 0% 0%, rgba(99, 102, 241, 0.1) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(168, 85, 247, 0.1) 0px, transparent 50%);
            margin: 0; 
            padding: 40px 20px;
            color: var(--text-dark);
            min-height: 100vh;
        }

        .container { 
            max-width: 1000px; 
            margin: auto; 
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            padding: 40px; 
            border-radius: 30px; 
            box-shadow: 0 20px 50px rgba(0,0,0,0.05);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 20px;
        }

        h2 { 
            margin: 0; 
            font-weight: 800; 
            font-size: 28px; 
            letter-spacing: -1px;
            background: var(--primary-grad);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-add { 
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 25px; 
            background: var(--primary-grad); 
            color: white; 
            text-decoration: none; 
            border-radius: 15px; 
            font-weight: 700; 
            font-size: 14px;
            transition: 0.3s;
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.2);
        }

        .btn-add:hover { 
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(99, 102, 241, 0.3);
        }

        /* Styling Tabel Modern */
        .table-responsive {
            overflow-x: auto;
            border-radius: 20px;
        }

        table { 
            width: 100%; 
            border-collapse: separate; 
            border-spacing: 0 10px; 
        }

        th { 
            background: transparent;
            color: #64748b; 
            padding: 15px 20px; 
            text-align: left; 
            text-transform: uppercase; 
            font-size: 12px; 
            letter-spacing: 1px;
            font-weight: 800;
        }

        td { 
            padding: 20px; 
            background: white;
            color: #475569; 
            font-size: 14px;
            border-top: 1px solid #f1f5f9;
            border-bottom: 1px solid #f1f5f9;
        }

        /* Membuat sudut melengkung pada setiap baris */
        td:first-child { border-left: 1px solid #f1f5f9; border-radius: 15px 0 0 15px; text-align: center; font-weight: 800; }
        td:last-child { border-right: 1px solid #f1f5f9; border-radius: 0 15px 15px 0; }

        tr:hover td {
            background: #f8fafc;
            border-color: #e2e8f0;
            transform: scale(1.005);
            transition: 0.2s;
        }

        /* Badge Styling */
        .badge { 
            padding: 6px 14px; 
            border-radius: 10px; 
            font-size: 11px; 
            font-weight: 700;
            display: inline-block;
        }
        .badge-jurusan { background: #e0e7ff; color: #4338ca; }
        .badge-jk { 
            background: #fdf2f8; 
            color: #be185d; 
            width: 25px; 
            text-align: center; 
            border-radius: 8px;
        }

        .nama-format { 
            font-weight: 800; 
            color: var(--text-dark); 
            font-size: 15px;
            margin-bottom: 2px;
        }
        
        .email-format {
            font-size: 12px; 
            color: #94a3b8;
        }

        .empty-state {
            text-align: center;
            padding: 50px;
            color: #94a3b8;
        }
        
        .empty-state i { font-size: 50px; margin-bottom: 15px; opacity: 0.3; }
    </style>
</head>
<body>

<div class="container">
    <div class="header-section">
        <h2>Daftar Mahasiswa Terdaftar</h2>
        <a href="index.php" class="btn-add">
            <i class="fa-solid fa-plus"></i> Tambah Mahasiswa
        </a>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th>Nama & Email</th>
                    <th>Jurusan</th>
                    <th width="80">L/P</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($mahasiswa as $row) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td>
                        <div class="nama-format"><?= strtoupper($row["nama"]); ?></div>
                        <div class="email-format"><i class="fa-regular fa-envelope"></i> <?= strtolower($row["email"]); ?></div>
                    </td>
                    <td><span class="badge badge-jurusan"><?= $row["jurusan"]; ?></span></td>
                    <td>
                        <span class="badge badge-jk">
                            <?= ($row["jenis_kelamin"] == "Laki-laki") ? "L" : "P"; ?>
                        </span>
                    </td>
                    <td>
                        <i class="fa-solid fa-location-dot" style="font-size: 12px; opacity: 0.5;"></i> 
                        <?= (strlen($row["alamat"]) > 35) ? substr($row["alamat"], 0, 35) . "..." : $row["alamat"]; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php if (empty($mahasiswa)) : ?>
        <div class="empty-state">
            <i class="fa-solid fa-folder-open"></i>
            <p>Belum ada data mahasiswa yang tersimpan.</p>
        </div>
    <?php endif; ?>
</div>

</body>
</html>