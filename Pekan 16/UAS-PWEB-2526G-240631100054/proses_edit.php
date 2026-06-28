<?php

include 'koneksi.php';

$id = $_POST['id'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$prodi = $_POST['prodi'];
$semester = $_POST['semester'];
$email = $_POST['email'];

$query = mysqli_query($koneksi, "UPDATE mahasiswa SET

nim='$nim',
nama='$nama',
prodi='$prodi',
semester='$semester',
email='$email'

WHERE id='$id'

");

if($query){

    echo "

    <script>

    alert('Data berhasil diupdate');

    window.location='daftar.php';

    </script>

    ";

}else{

    echo "

    <script>

    alert('Data gagal diupdate');

    window.location='edit.php?id=$id';

    </script>

    ";

}

?>