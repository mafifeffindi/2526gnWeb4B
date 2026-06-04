<?php
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    die("Akses ditolak! Silakan login terlebih dahulu di halaman login resmi.");
}

set_time_limit(60);

$daftar_nama_depan = ['Alif', 'Rifka', 'Maulana', 'Aidah', 'Fatin', 'Budi', 'Siti', 'Andi', 'Dewi', 'Rian', 'Eka', 'Fajar', 'Putri', 'Hendra', 'Sari', 'Roni', 'Mega', 'Taufik', 'Aulia', 'Dimas'];
$daftar_nama_belakang = ['Saputra', 'Lestari', 'Wibowo', 'Rahayu', 'Kusuma', 'Utami', 'Hidayat', 'Permata', 'Nugroho', 'Pratiwi', 'Setiawan', 'Wijaya', 'Siregar', 'Ramadhan', 'Fitriani'];
$daftar_prodi = ['Pendidikan Informatika', 'Teknik Informatika', 'Sistem Informasi', 'Teknik Elektro', 'Teknik Industri'];

$jumlah_data_yang_diinginkan = 50;
$berhasil = 0;

for ($i = 1; $i <= $jumlah_data_yang_diinginkan; $i++) {
    $nama_acak = $daftar_nama_depan[array_rand($daftar_nama_depan)] . ' ' . $daftar_nama_belakang[array_rand($daftar_nama_belakang)];
    $prodi_acak = $daftar_prodi[array_rand($daftar_prodi)];
    $nim_acak = "2404111" . str_pad($i, 3, "0", STR_PAD_LEFT);
    $email_acak = strtolower(str_replace(' ', '', $nama_acak)) . $i . "@gmail.com";
    $no_hp_acak = "08" . rand(111111111, 999999999);

    $query = "INSERT INTO mahasiswa (nim, nama, prodi, email, no_hp) 
              VALUES ('$nim_acak', '$nama_acak', '$prodi_acak', '$email_acak', '$no_hp_acak')";
    
    if (mysqli_query($koneksi, $query)) {
        $berhasil++;
    }
}

echo "<div style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>";
echo "<h2>Proses Otomatisasi Pengisian Data Selesai!</h2>";
echo "<p style='color: green; font-size: 18px;'>Berhasil menyuntikkan <strong>$berhasil</strong> data mahasiswa baru ke dalam database.</p>";
echo "<a href='index.php' style='padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;'>Kembali ke Dashboard</a>";
echo "</div>";
?>