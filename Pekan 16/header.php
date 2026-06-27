<?php
// header.php — include di setiap halaman
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? $page_title . ' — ' : '' ?>Sistem Pendataan Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-brand">
        <h2>🎓 Pendataan Mahasiswa</h2>
        <p>UTM — Pendidikan Informatika</p>
    </div>
    <nav class="sidebar-nav">
        <a href="index.php"   class="<?= $current_page === 'index.php'   ? 'active' : '' ?>">
            <span class="icon">🏠</span> Beranda
        </a>
        <a href="daftar.php"  class="<?= $current_page === 'daftar.php'  ? 'active' : '' ?>">
            <span class="icon">📋</span> Daftar Mahasiswa
        </a>
        <a href="tambah.php"  class="<?= $current_page === 'tambah.php'  ? 'active' : '' ?>">
            <span class="icon">➕</span> Tambah Mahasiswa
        </a>
    </nav>
    <div class="sidebar-footer">
        Ahmad Dhani &bull; 240631100050
    </div>
</aside>

<!-- MAIN -->
<div class="main">
    <div class="topbar">
        <div>
            <h1><?= isset($page_title) ? $page_title : 'Dashboard' ?></h1>
            <span class="breadcrumb"><?= isset($breadcrumb) ? $breadcrumb : 'Beranda' ?></span>
        </div>
        <div class="user-info">
            👤 Ahmad Dhani &nbsp;|&nbsp; <?= date('d M Y') ?>
        </div>
    </div>
    <div class="content">
