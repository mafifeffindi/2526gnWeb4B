# 📚 Sistem Pendataan Buku 

## Deskripsi Project

Sistem Pendataan Buku Perpustakaan merupakan aplikasi berbasis web yang digunakan untuk mengelola data buku.

Aplikasi ini dibuat untuk memenuhi tugas Ujian Akhir Semester (UAS) Pemrograman Web dengan menerapkan konsep HTML5, CSS, PHP Native, dan MySQL.

Pada aplikasi ini pengguna dapat melakukan pengelolaan data buku seperti menambahkan, melihat, mengubah, dan menghapus data buku.

---

## 🛠 Teknologi yang Digunakan

- HTML5
- CSS3
- PHP Native
- MySQL
- XAMPP
- Visual Studio Code

---

## ✨ Fitur Aplikasi

### 🏠 Halaman Home / Beranda
- Tampilan utama aplikasi
- Informasi sistem pendataan buku
- Menampilkan jumlah data buku

### 📖 Daftar Buku
- Menampilkan seluruh data buku
- Data ditampilkan dalam bentuk tabel
- Terdapat aksi edit dan hapus

### ➕ Tambah Buku
- Menambahkan data buku baru
- Data tersimpan ke database

Data yang dimasukkan:
- Judul buku
- Penulis
- Penerbit
- Tahun terbit
- Kategori

### ✏ Edit Buku
- Mengubah data buku yang sudah tersimpan

### 🗑 Hapus Buku
- Menghapus data buku dari database

---

## 📂 Struktur Folder

```
db_buku

│
├── index.php
├── tambah.php
├── daftar.php
├── edit.php
├── hapus.php
├── koneksi.php
├── database.sql
│
├── css
│   └── style.css
│
├── img
│   └── buku.png
│
└── README.md
```

---

## 🗄 Database

Nama Database:

```
db_buku
```

Nama Tabel:

```
buku
```

Struktur tabel:

| Field | Type |
|---|---|
| id | INT |
| judul | VARCHAR |
| penulis | VARCHAR |
| penerbit | VARCHAR |
| tahun | INT |
| kategori | VARCHAR |

---

## 🚀 Cara Menjalankan Project

1. Install XAMPP

2. Aktifkan:
- Apache
- MySQL

3. Simpan folder project ke:

```
htdocs
```

4. Buka phpMyAdmin

5. Import file:

```
database.sql
```

6. Jalankan aplikasi melalui browser:

```
localhost/db_buku
```

---

## 🔥 Konsep PHP yang Digunakan

Project ini menerapkan:

- Variabel PHP
- Percabangan (if)
- Perulangan (while)
- Function PHP
- Include file
- Form GET dan POST
- CRUD Database

---

## 👩‍💻 Pembuat

Nama:
**Febi Nurshitawati**

Mata Kuliah:
**Pemrograman Web**

Tahun:
**2026**
