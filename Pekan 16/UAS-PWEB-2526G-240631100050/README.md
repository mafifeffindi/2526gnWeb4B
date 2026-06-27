# 🎓 Sistem Pendataan Mahasiswa

**UAS Pemrograman Web — 2025/2026**

---

## 👤 Identitas

| | |
|---|---|
| **Nama** | Ahmad Dhani |
| **NIM** | 240631100050 |
| **Kelas** | 4B |
| **Program Studi** | Pendidikan Informatika |
| **Fakultas** | FKIP — Universitas Trunojoyo Madura |

---

## 📋 Judul Aplikasi

**Sistem Pendataan Mahasiswa**

---

## 📝 Deskripsi Singkat

Aplikasi web berbasis PHP Native dan MySQL untuk mengelola data mahasiswa Program Studi Pendidikan Informatika UTM. Aplikasi menyediakan fitur CRUD lengkap (Create, Read, Update, Delete), pencarian data, filter berdasarkan status, paginasi, dan dashboard statistik mahasiswa.

---

## ✨ Fitur Utama

- **Dashboard** — statistik total, aktif, cuti, dan lulus
- **Daftar Mahasiswa** — tabel dengan pencarian & filter status
- **Tambah Mahasiswa** — form dengan validasi input
- **Edit Mahasiswa** — perbarui data yang sudah ada
- **Detail Mahasiswa** — tampilan lengkap satu data
- **Hapus Mahasiswa** — dengan konfirmasi dialog
- **Paginasi** — 10 data per halaman

---

## 🖼️ Screenshot Aplikasi

> *(Tambahkan screenshot ke folder `img/` dan masukkan di sini setelah menjalankan aplikasi)*

| Halaman | Keterangan |
|---|---|
| `img/beranda.png` | Dashboard / Beranda |
| `img/daftar.png` | Daftar Mahasiswa |
| `img/tambah.png` | Form Tambah |
| `img/edit.png` | Form Edit |

---

## 🗄️ Struktur Database

**Database:** `db_mahasiswa`

**Tabel:** `mahasiswa`

| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | INT (PK, AI) | ID unik |
| `nim` | VARCHAR(20) | NIM mahasiswa (unique) |
| `nama` | VARCHAR(100) | Nama lengkap |
| `jurusan` | VARCHAR(100) | Program studi |
| `angkatan` | YEAR | Tahun angkatan |
| `jenis_kelamin` | ENUM('L','P') | Jenis kelamin |
| `email` | VARCHAR(100) | Email |
| `no_hp` | VARCHAR(20) | Nomor HP |
| `alamat` | TEXT | Alamat lengkap |
| `status` | ENUM | Aktif/Cuti/Lulus/DO |
| `created_at` | TIMESTAMP | Waktu input |

---

## 📁 Struktur Repository

```
UAS-PWEB-2526G-240631100050/
├── index.php       ← Beranda / Dashboard
├── daftar.php      ← Daftar Mahasiswa (Read)
├── tambah.php      ← Tambah Mahasiswa (Create)
├── edit.php        ← Edit Mahasiswa (Update)
├── hapus.php       ← Hapus Mahasiswa (Delete)
├── detail.php      ← Detail Mahasiswa
├── koneksi.php     ← Koneksi database + functions
├── header.php      ← Template header (include)
├── footer.php      ← Template footer (include)
├── database.sql    ← File SQL database
├── css/
│   └── style.css   ← Stylesheet eksternal
├── img/            ← Screenshot aplikasi
└── README.md
```

---

## 🚀 Cara Menjalankan Aplikasi

### Persyaratan
- XAMPP (PHP 7.4+ & MySQL)
- Web browser

### Langkah-langkah

1. **Clone / download** repository ini ke folder `htdocs` XAMPP:
   ```
   C:\xampp\htdocs\UAS-PWEB-2526G-240631100050\
   ```

2. **Import database** — buka `http://localhost/phpmyadmin`:
   - Klik **New** → buat database `db_mahasiswa`
   - Klik tab **Import** → pilih file `database.sql` → klik **Go**

3. **Konfigurasi koneksi** — buka `koneksi.php`, sesuaikan jika perlu:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');
   define('DB_PASS', '');       // isi password jika ada
   define('DB_NAME', 'db_mahasiswa');
   ```

4. **Jalankan aplikasi** — buka browser:
   ```
   http://localhost/UAS-PWEB-2526G-240631100050/
   ```

---

## 🤖 Pernyataan Penggunaan GenAI

Proyek ini dikembangkan dengan bantuan ChatGPT sebagai alat bantu dalam penyusunan kode, perbaikan error, dan dokumentasi. Seluruh implementasi, pengujian, dan penyesuaian yang dilakukan.

---

## 📄 Lisensi

Dibuat untuk keperluan akademik — UAS Pemrograman Web FKIP UTM 2025/2026.
