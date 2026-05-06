<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Mini App</title>
    <!-- Google Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-grad: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            --accent: #6366f1;
            --text-dark: #1e293b;
            --white: #ffffff;
        }

        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background: #f1f5f9;
            background-image: 
                radial-gradient(at 0% 0%, rgba(99, 102, 241, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(168, 85, 247, 0.15) 0px, transparent 50%);
            margin: 0; 
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Animasi Masuk */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .container { 
            width: 100%;
            max-width: 600px; 
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 35px; 
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1); 
            margin: 40px 20px;
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.8s ease-out;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* HEADER AREA (Sesuai image_e4ee29.png tapi lebih artistik) */
        .header-accent {
            background: var(--primary-grad);
            padding: 60px 40px;
            text-align: center;
            color: white;
            position: relative;
        }

        .header-accent h2 { 
            margin: 0;
            font-weight: 800;
            font-size: 30px;
            letter-spacing: -1px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .header-accent p {
            opacity: 0.9;
            font-size: 15px;
            margin-top: 10px;
        }

        /* Dekorisasi Bulatan di Header */
        .header-accent::after {
            content: "";
            position: absolute;
            width: 100px; height: 100px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            top: -20px; right: -20px;
        }

        .form-content { padding: 40px; }

        .form-group { margin-bottom: 22px; position: relative; }

        label { 
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px; 
            font-weight: 600; 
            font-size: 14px;
            color: var(--text-dark);
        }

        label i { color: var(--accent); font-size: 16px; }

        input, select, textarea { 
            width: 100%; 
            padding: 15px 20px; 
            border: 2px solid #e2e8f0; 
            border-radius: 18px; 
            font-family: inherit;
            font-size: 15px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-sizing: border-box;
            background: white;
        }

        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: var(--accent);
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
            transform: scale(1.01);
        }

        .radio-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .radio-btn {
            position: relative;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px;
            border: 2px solid #e2e8f0;
            border-radius: 18px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: 600;
            font-size: 15px;
            justify-content: center;
        }

        .radio-btn input { display: none; }

        .radio-btn:has(input:checked) {
            border-color: var(--accent);
            background: #6366f10d;
            color: var(--accent);
        }

        button { 
            width: 100%; 
            padding: 20px; 
            background: var(--primary-grad); 
            border: none; 
            color: white; 
            font-size: 17px; 
            font-weight: 800;
            border-radius: 20px; 
            cursor: pointer; 
            transition: 0.4s;
            margin-top: 15px;
            box-shadow: 0 10px 25px rgba(99, 102, 241, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        button:hover { 
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 20px 40px rgba(99, 102, 241, 0.4);
        }

        .footer-link {
            text-align: center;
            margin-top: 35px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }

        .footer-link a {
            color: var(--accent);
            text-decoration: none;
            font-size: 15px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
        }

        .footer-link a:hover { gap: 15px; }
    </style>
</head>
<body>

<div class="container">
    <div class="header-accent">
        <h2>Student Registration Mini App</h2>
        <p>Bergabunglah bersama ribuan mahasiswa lainnya hari ini</p>
    </div>

    <div class="form-content">
        <form action="proses.php" method="POST">
            <div class="form-group">
                <label><i class="fa-solid fa-user"></i> Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Masukkan nama lengkap Anda" required>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-envelope"></i> Alamat Email</label>
                <input type="email" name="email" placeholder="contoh@email.com" required>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-graduation-cap"></i> Program Studi</label>
                <select name="jurusan" required>
                    <option value="" disabled selected>Pilih Jurusan Anda...</option>
                    <option value="Informatika">Teknik Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Teknik Elektro">Teknik Elektro</option>
                    <option value="Manajemen">Manajemen Bisnis</option>
                </select>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-venus-mars"></i> Jenis Kelamin</label>
                <div class="radio-group">
                    <label class="radio-btn">
                        <input type="radio" name="jenis_kelamin" value="Laki-laki" checked>
                        <i class="fa-solid fa-mars"></i> Laki-laki
                    </label>
                    <label class="radio-btn">
                        <input type="radio" name="jenis_kelamin" value="Perempuan">
                        <i class="fa-solid fa-venus"></i> Perempuan
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-calendar-days"></i> Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" required>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-location-dot"></i> Alamat Domisili</label>
                <textarea name="alamat" rows="3" placeholder="Tuliskan alamat lengkap tempat tinggal..."></textarea>
            </div>

            <button type="submit" name="submit">
                DAFTAR SEKARANG <i class="fa-solid fa-arrow-right"></i>
            </button>
        </form>

        <div class="footer-link">
            <a href="tampil.php">Lihat Data Mahasiswa Terdaftar <i class="fa-solid fa-chevron-right"></i></a>
        </div>
    </div>
</div>

</body>
</html>