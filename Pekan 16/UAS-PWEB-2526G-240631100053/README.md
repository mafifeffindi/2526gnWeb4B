# UAS Pemrograman Web - Sistem Pendataan Mahasiswa

### Identitas Mahasiswa
* **Nama**: Nabila Ilma Safiyah
* **NIM**: 240631100053
* **Judul Aplikasi**: Sistem Pendataan Mahasiswa Berbasis Web Native

### Deskripsi Singkat
Sistem Pendataan Mahasiswa adalah aplikasi berbasis web sederhana yang dikembangkan menggunakan HTML5, CSS (Bootstrap 5), PHP Native, dan database MySQL. Aplikasi ini mengimplementasikan fitur CRUD lengkap untuk manajemen data mahasiswa, validasi form, dan 2 fungsi utilitas khusus.

### Struktur Database
* **Database**: `crud_mahasiswa`
* **Tabel**: `mahasiswa`
  * `id` (INT, Primary Key, Auto Increment)
  * `nim` (VARCHAR, Unique)
  * `nama` (VARCHAR)
  * `jurusan` (VARCHAR)
  * `email` (VARCHAR)
  * `angkatan` (INT)

### Cara Menjalankan Aplikasi
1. Clone atau download repository ini dan letakkan di dalam folder `htdocs` server lokal Anda (XAMPP).
2. Nyalakan modul Apache dan MySQL pada XAMPP Control Panel.
3. Buka phpMyAdmin (`http://localhost/phpmyadmin`), buat database baru bernama `crud_mahasiswa`.
4. Import file `database.sql` ke dalam database tersebut.
5. Akses aplikasi melalui browser dengan alamat `http://localhost/UAS_NABILAILMA/`.

### Penggunaan Perangkat GenAI
Proyek ini dikembangkan dengan bantuan fitur asistensi perangkat Kecerdasan Artifisial (GenAI) untuk optimasi formatting kode pemrograman, struktur HTML5, responsivitas Bootstrap 5, dan penyusunan file README.md ini.

### Screenshot Aplikasi
*(Tambahkan gambar screenshot aplikasi Anda di dalam folder `img/` dan panggil di sini)*
![Beranda](img/screenshot_beranda.png)