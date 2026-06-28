<?php

include 'database.php';

$nama = bersihkan($_POST['nama']);
$no_hp = bersihkan($_POST['no_hp']);
$email = bersihkan($_POST['email']);
$alamat = bersihkan($_POST['alamat']);
$kategori = bersihkan($_POST['kategori']);

$foto = "default.png";

if($_FILES['foto']['name']!=""){

    $foto = time()."_".$_FILES['foto']['name'];

    move_uploaded_file(
        $_FILES['foto']['tmp_name'],
        "assets/upload/".$foto
    );

}

mysqli_query($conn,"INSERT INTO kontak
(nama,no_hp,email,alamat,kategori,foto)

VALUES

('$nama','$no_hp','$email','$alamat','$kategori','$foto')
");

echo "

<script>

alert('Data berhasil ditambahkan');

document.location='daftar.php';

</script>

";

?>