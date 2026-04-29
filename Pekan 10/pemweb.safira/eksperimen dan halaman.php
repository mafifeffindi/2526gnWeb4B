*Bagian 2: File eksperimen.php*
(Aktivitas 2: Eksperimen Output Dinamis)
php
<?php
// File: eksperimen.php
echo "<h1>Profil Mahasiswa</h1>";
echo "<hr>";
echo "Nama: Safira<br>";
echo "Universitas: Universitas Trunojoyo Madura<br>";
echo "Hobi: Menulis dan Membaca<br>";
echo "Cita-cita: Menjadi pengembang sistem yang handal<br>";
echo "Alasan belajar web programming: Agar bisa membangun platform edukasi yang 
interaktif.";
?>

*Bagian 3: File halaman.php*
(Aktivitas 4: Kombinasi HTML + PHP)
File ini memadukan struktur dasar HTML dengan skrip PHP di dalamnya.
php
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
<title>Latihan PHP - Modul 9</title>
</head>
<body>
 <h1>Belajar PHP</h1>
 <p>Ini adalah eksperimen pertama saya menggabungkan HTML dan PHP dalam satu 
file.</p>
     <?php
echo "<h3>Status Sistem:</h3>";
echo "Hari ini saya belajar server-side programming.<br>";
echo "PHP dijalankan oleh server, dan hasilnya dikirim ke browser.";
?>
</body>
</html>