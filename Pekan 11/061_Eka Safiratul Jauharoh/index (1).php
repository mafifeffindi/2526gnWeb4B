<!DOCTYPE html>
<html>
<head>
    <title>Input Data Mahasiswa</title>
</head>
<body>
    <h2>Form Pendaftaran Mahasiswa</h2>
    <!-- Data dikirim ke proses.php -->
    <form action="proses.php" method="POST">
        Nama: <input type="text" name="nama" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Jurusan: <input type="text" name="jurusan" required><br><br>
        Alamat: <textarea name="alamat" required></textarea><br><br>
        Jenis Kelamin: 
        <input type="radio" name="jenis_kelamin" value="Laki-laki" checked> Laki-laki
        <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan<br><br>
        Tanggal Lahir: <input type="date" name="tgl_lahir" required><br><br>
        
        <button type="submit" name="submit">Simpan Data</button>
        <a href="tampil.php">Lihat Daftar</a>
    </form>
</body>
</html>