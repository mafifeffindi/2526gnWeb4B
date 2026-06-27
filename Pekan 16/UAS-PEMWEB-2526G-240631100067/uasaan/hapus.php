<?php

include 'koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id='$id'");

if($query){

    echo "

    <script>

    alert('Data berhasil dihapus');

    window.location='daftar.php';

    </script>

    ";

}else{

    echo "

    <script>

    alert('Data gagal dihapus');

    window.location='daftar.php';

    </script>

    ";

}

?>