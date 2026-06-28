# 📒 Sistem Data Kontak

## 👤 Identitas Mahasiswa

**Nama:** Safinatus Soleha

**NIM:** *(Isi dengan NIM kamu)*

**Mata Kuliah:** Pemrograman Web

---

# 📌 Judul Aplikasi

**Sistem Data Kontak Berbasis Web Menggunakan PHP Native dan MySQL**

---

# 📖 Deskripsi Singkat

Sistem Data Kontak merupakan aplikasi berbasis web yang digunakan untuk mengelola data kontak secara mudah dan efisien. Aplikasi ini dibangun menggunakan HTML, CSS, Bootstrap, PHP Native, dan MySQL dengan konsep CRUD (Create, Read, Update, Delete).

Pengguna dapat menambahkan data kontak, melihat daftar kontak, mengedit data, menghapus data, serta mencari kontak berdasarkan nama, nomor telepon, maupun email.

---

# ✨ Fitur Aplikasi

* Dashboard
* Menampilkan jumlah kontak
* Menambah data kontak
* Menampilkan daftar kontak
* Mengedit data kontak
* Menghapus data kontak
* Pencarian kontak
* Upload foto kontak
* Tampilan responsive menggunakan Bootstrap 5

---

# 🛠️ Teknologi yang Digunakan

* HTML5
* CSS3
* Bootstrap 5
* PHP Native
* MySQL
* XAMPP
* Font Awesome

---

# 🗄️ Struktur Database

### Nama Database

```text
db_kontak
```

### Nama Tabel

```text
kontak
```

### Struktur Tabel

| Field      | Tipe Data                         |
| ---------- | --------------------------------- |
| id         | INT (Primary Key, Auto Increment) |
| nama       | VARCHAR(100)                      |
| no_hp      | VARCHAR(20)                       |
| email      | VARCHAR(100)                      |
| alamat     | TEXT                              |
| kategori   | VARCHAR(50)                       |
| foto       | VARCHAR(255)                      |
| created_at | TIMESTAMP                         |

---

# 📷 Screenshot Aplikasi

## Dashboard

*(Masukkan screenshot dashboard di sini)*

## Daftar Kontak

*(Masukkan screenshot daftar kontak di sini)*

## Tambah Kontak

*(Masukkan screenshot form tambah kontak di sini)*

## Edit Kontak

*(Masukkan screenshot edit kontak di sini)*

---

# 📂 Struktur Folder

```text
kontak/
│
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── img/
│   └── upload/
│
├── database.php
├── navbar.php
├── footer.php
├── index.php
├── daftar.php
├── tambah.php
├── proses_tambah.php
├── edit.php
├── proses_edit.php
├── hapus.php
├── database.sql
└── README.md
```

---

# ▶️ Cara Menjalankan Aplikasi

1. Install XAMPP.
2. Jalankan Apache dan MySQL.
3. Salin folder project ke dalam folder **htdocs**.
4. Buka phpMyAdmin.
5. Buat database dengan nama **db_kontak**.
6. Import file **database.sql**.
7. Buka browser.
8. Akses aplikasi melalui:

```
http://localhost/kontak/
```

---

# 👨‍💻 Fitur CRUD

* ✅ Create (Tambah Data)
* ✅ Read (Menampilkan Data)
* ✅ Update (Edit Data)
* ✅ Delete (Hapus Data)

---

# 📄 Lisensi

Project ini dibuat untuk memenuhi tugas **Ujian Akhir Semester (UAS)** Mata Kuliah **Pemrograman Web**.
