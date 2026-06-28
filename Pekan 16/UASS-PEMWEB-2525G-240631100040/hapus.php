<?php

include 'database.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM kontak WHERE id='$id'"));

if($data['foto']!="default.png"){

    unlink("assets/upload/".$data['foto']);

}

mysqli_query($conn,"DELETE FROM kontak WHERE id='$id'");

echo "

<script>

alert('Data berhasil dihapus');

document.location='daftar.php';

</script>

";

?>