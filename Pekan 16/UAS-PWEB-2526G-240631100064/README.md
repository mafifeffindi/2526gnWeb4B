# 🎓 Sistem Pendataan Mahasiswa

> UAS Pemrograman Web — Universitas Trunojoyo Madura

---

## 👤 Identitas

| Keterangan | Detail |
|---|---|
| **Nama** | Hamzah |
| **NIM** | 240631100064 |
| **Prodi** | Pendidikan Informatika |
| **Mata Kuliah** | Pemrograman Web |

---

## 📌 Deskripsi Aplikasi

Aplikasi web **Sistem Pendataan Mahasiswa** adalah aplikasi berbasis PHP Native dan MySQL yang memungkinkan pengelolaan data mahasiswa secara lengkap. Aplikasi ini mendukung operasi CRUD (Create, Read, Update, Delete) serta fitur pencarian data mahasiswa.

---

## ✨ Fitur

- ✅ Tambah data mahasiswa baru
- ✅ Lihat daftar semua mahasiswa
- ✅ Edit data mahasiswa
- ✅ Hapus data mahasiswa
- ✅ Pencarian berdasarkan NIM, Nama, atau Prodi
- ✅ Statistik jumlah mahasiswa (total, laki-laki, perempuan)

---

## 🗂️ Struktur Database

**Database:** `db_mahasiswa`

**Tabel:** `mahasiswa`

| Kolom | Tipe | Keterangan |
|---|---|---|
| id | INT AUTO_INCREMENT | Primary Key |
| nim | VARCHAR(20) | NIM Mahasiswa (UNIQUE) |
| nama | VARCHAR(100) | Nama Lengkap |
| prodi | VARCHAR(100) | Program Studi |
| angkatan | YEAR | Tahun Angkatan |
| jenis_kelamin | ENUM | Laki-laki / Perempuan |
| email | VARCHAR(100) | Email |
| no_hp | VARCHAR(15) | Nomor HP |
| created_at | TIMESTAMP | Waktu dibuat |

---

## 📁 Struktur File

```
UAS-PWEB-2526G-240631100064/
├── index.php          → Halaman Beranda
├── tambah.php         → Form Tambah Data
├── simpan.php         → Proses Simpan Data
├── daftar.php         → Daftar Semua Data
├── edit.php           → Form Edit Data
├── update.php         → Proses Update Data
├── hapus.php          → Proses Hapus Data
├── koneksi.php        → Koneksi Database
├── database.sql       → File SQL Database
├── css/
│   └── style.css      → CSS Eksternal
└── README.md
```

---

## ⚙️ Cara Menjalankan

1. **Install XAMPP** (atau server PHP + MySQL lainnya)
2. **Copy folder** project ke `C:/xampp/htdocs/`  
   Rename folder menjadi `UAS-PWEB`
3. **Import database:**
   - Buka `http://localhost/phpmyadmin`
   - Buat database baru: `db_mahasiswa`
   - Import file `database.sql`
4. **Jalankan aplikasi:**
   - Buka browser → `http://localhost/UAS-PWEB/`

> Jika password MySQL bukan kosong, edit file `koneksi.php` bagian `DB_PASS`.

---

## 🛠️ Teknologi

- HTML5
- CSS3 (Custom)
- PHP Native
- MySQL

---

## 🤖 Pernyataan Penggunaan GenAI

Proyek ini dikembangkan dengan bantuan **Claude AI (Anthropic)** sebagai alat bantu penulisan kode dan struktur aplikasi.
