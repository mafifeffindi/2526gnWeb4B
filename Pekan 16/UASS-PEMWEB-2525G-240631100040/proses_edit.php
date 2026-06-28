<?php

include 'database.php';

$id = $_POST['id'];

$nama = bersihkan($_POST['nama']);
$no_hp = bersihkan($_POST['no_hp']);
$email = bersihkan($_POST['email']);
$alamat = bersihkan($_POST['alamat']);
$kategori = bersihkan($_POST['kategori']);

$foto = $_POST['fotoLama'];

if($_FILES['foto']['name']!=""){

    if($foto!="default.png"){
        unlink("assets/upload/".$foto);
    }

    $foto = time()."_".$_FILES['foto']['name'];

    move_uploaded_file($_FILES['foto']['tmp_name'],"assets/upload/".$foto);

}

mysqli_query($conn,"UPDATE kontak SET

nama='$nama',
no_hp='$no_hp',
email='$email',
alamat='$alamat',
kategori='$kategori',
foto='$foto'

WHERE id='$id'

");

echo "

<script>

alert('Data berhasil diupdate');

document.location='daftar.php';

</script>

";

?>