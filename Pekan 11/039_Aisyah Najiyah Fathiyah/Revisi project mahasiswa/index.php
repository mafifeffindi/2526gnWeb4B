<center> <h2>Form Mahasiswa</h2>

<form action="proses.php" method="POST">

    Nama: <br>
    <input type="text" name="nama"><br><br>

    Email: <br>
    <input type="text" name="email"><br><br>

    <?php
$jurusan_list = [
    "Teknik Informatika",
    "Sistem Informasi",
    "Pendidikan Informatika",
    "Manajemen",
    "Akuntansi"
];
?>

Jurusan: <br>
<select name="jurusan">
    <?php foreach($jurusan_list as $j) { ?>
        <option value="<?= $j ?>"><?= $j ?></option>
    <?php } ?>
</select><br><br>

    Alamat: <br>
    <textarea name="alamat"></textarea><br><br>

    Jenis Kelamin: <br>
    <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
    <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
    <br><br>

    Tanggal Lahir: <br>
    <input type="date" name="tgl_lahir"><br><br>

    <button type="submit">Simpan</button>

</form> </center>
