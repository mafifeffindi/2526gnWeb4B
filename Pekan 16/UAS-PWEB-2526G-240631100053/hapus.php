<?php
require_once 'koneksi.php';

// Form Processing via GET parameter
if (isset($_GET['id'])) {
    $id = bersihkanInput($_GET['id']);
    
    $query = "DELETE FROM mahasiswa WHERE id = '$id'";
    
    // Percabangan
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    header("Location: index.php");
    exit;
}
?>