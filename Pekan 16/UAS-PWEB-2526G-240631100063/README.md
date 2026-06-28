# 📚 Sistem Informasi Data Buku Perpustakaan

**UAS Pemrograman Web — 2025/2026**

## 👤 Identitas

| Keterangan    | Isi                                 |
| ------------- | ----------------------------------- |
| Nama          | Lusiana Nur Afizah                  |
| NIM           | 240631100063                        |
| Kelas         | 4B                                  |
| Program Studi | Pendidikan Informatika              |
| Fakultas      | FKIP — Universitas Trunojoyo Madura |

---

## 📋 Judul Aplikasi

**Sistem Informasi Data Buku Perpustakaan**

---

## 📝 Deskripsi Singkat

Aplikasi web berbasis PHP Native dan MySQL untuk mengelola data buku perpustakaan secara digital.  
Aplikasi ini menyediakan fitur CRUD (Create, Read, Update, Delete) untuk memudahkan pengelolaan data buku.

---

## ✨ Fitur Utama

- Dashboard / Beranda
- Tambah Data Buku
- Daftar Buku
- Edit Data Buku
- Hapus Data Buku

---

## 🗄️ Struktur Database

**Database:** `db_bukuu`

**Tabel:** `buku`

| Kolom        | Tipe         | Keterangan    |
| ------------ | ------------ | ------------- |
| id           | INT (PK, AI) | ID unik       |
| judul        | VARCHAR(100) | Judul buku    |
| penulis      | VARCHAR(100) | Nama penulis  |
| penerbit     | VARCHAR(100) | Nama penerbit |
| tahun_terbit | YEAR         | Tahun terbit  |

---

## 📁 Struktur Repository

```bash
pendataan_buku/
├── index.php
├── tambah.php
├── daftar.php
├── edit.php
├── hapus.php
├── koneksi.php
├── functions.php
├── style.css
├── db_bukuu.sql
└── README.md
```

---

## 🚀 Cara Menjalankan Aplikasi

### 1. Pindahkan project ke folder:

```bash
C:\xampp\htdocs\pendataan_buku\
```

### 2. Jalankan Apache dan MySQL di XAMPP

Pastikan service berikut aktif:

- Apache
- MySQL

### 3. Import database:

- buka `http://localhost/phpmyadmin`
- buat database `db_bukuu`
- import file `db_bukuu.sql`

### 4. Jalankan di browser:

```bash
http://localhost/pendataan_buku/
```

---

## 🤖 Pernyataan Penggunaan GenAI

Proyek ini dikembangkan dengan bantuan teknologi **Generative AI (ChatGPT)** sebagai alat bantu dalam proses pengembangan aplikasi.

AI digunakan untuk membantu dalam:

- Penyusunan kode program
- Perbaikan error (debugging)
- Pembuatan dokumentasi
- Penyusunan file README.md

Penggunaan AI hanya sebagai pendukung, sedangkan proses analisis, perancangan, implementasi, pengujian, dan penyelesaian akhir tetap dilakukan oleh penulis.

---

## 📄 Lisensi

Dibuat untuk keperluan akademik — UAS Pemrograman Web FKIP UTM 2025/2026

---