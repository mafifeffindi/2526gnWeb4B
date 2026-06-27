<?php

include 'koneksi.php';

$nim=$_POST['nim'];
$nama=$_POST['nama'];
$prodi=$_POST['prodi'];
$semester=$_POST['semester'];
$email=$_POST['email'];

$query=mysqli_query($koneksi,"INSERT INTO mahasiswa
(nim,nama,prodi,semester,email)
VALUES
('$nim','$nama','$prodi','$semester','$email')
");

if($query){

    echo "

    <script>

    alert('Data berhasil ditambahkan');

    window.location='daftar.php';

    </script>

    ";

}else{

    echo "

    <script>

    alert('Data gagal ditambahkan');

    window.location='tambah.php';

    </script>

    ";

}

?>