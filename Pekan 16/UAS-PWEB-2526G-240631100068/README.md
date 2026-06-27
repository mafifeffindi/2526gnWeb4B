# Sistem Pendataan Buku

## Identitas

**Nama:** Sitti Khotijah
**NIM:** *(240631100068)*
**Mata Kuliah:** Pemrograman Web
**Universitas:** Universitas Trunojoyo Madura

---

## Deskripsi Aplikasi

Sistem Pendataan Buku merupakan aplikasi berbasis web yang dibuat untuk memenuhi tugas Ujian Akhir Semester (UAS) Mata Kuliah Pemrograman Web. Aplikasi ini digunakan untuk mengelola data buku dengan fitur Create, Read, Update, dan Delete (CRUD).

Aplikasi dikembangkan menggunakan HTML, CSS, Bootstrap, PHP Native, dan MySQL.

---

## Fitur Aplikasi

* Menampilkan daftar buku
* Menambahkan data buku
* Mengubah data buku
* Menghapus data buku
* Pencarian data buku
* Tampilan menggunakan Bootstrap

---

## Teknologi yang Digunakan

* HTML
* CSS
* Bootstrap 5
* PHP Native
* MySQL
* XAMPP

---

## Struktur Folder

```text
UASPWEB/
│── config/
│   └── koneksi.php
│── css/
│   └── style.css
│── index.php
│── daftar.php
│── tambah.php
│── edit.php
│── hapus.php
│── function.php
│── database.sql
│── README.md
```

---

## Database

**Nama Database:** `db_buku`

**Nama Tabel:** `buku`

Field yang digunakan:

* id
* judul
* penulis
* penerbit
* tahun

---

## Cara Menjalankan Program

1. Jalankan XAMPP.
2. Aktifkan Apache dan MySQL.
3. Import file `database.sql` ke phpMyAdmin.
4. Pindahkan folder **UASPWEB** ke dalam folder `htdocs`.
5. Buka browser.
6. Akses aplikasi melalui:

```
http://localhost/UASPWEB
```

---

## Tampilan Aplikasi

* Halaman Home
* Halaman Daftar Buku
* Halaman Tambah Buku
* Halaman Edit Buku

---

## Penutup

Aplikasi ini dibuat sebagai salah satu syarat memenuhi tugas Ujian Akhir Semester Mata Kuliah Pemrograman Web di Universitas Trunojoyo Madura.

