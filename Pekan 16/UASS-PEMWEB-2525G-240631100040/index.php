<?php

include 'database.php';

include 'navbar.php';

$total = jumlahKontak();

?>

<div class="hero">

<div class="row align-items-center">

<div class="col-md-7">

<h1>Selamat Datang 👋</h1>

<p>

Kelola seluruh data kontak dengan mudah, cepat dan aman.

</p>

<a href="tambah.php" class="btn btn-primary">

<i class="fa fa-user-plus"></i>

Tambah Kontak

</a>

<a href="daftar.php" class="btn btn-success">

<i class="fa fa-users"></i>

Lihat Kontak

</a>

</div>

<div class="col-md-5 text-center">

<img src="assets/img/contact.png" class="img-fluid">

</div>

</div>

</div>

<div class="row mt-5">

<div class="col-md-4">

<div class="card dashboard">

<div class="card-body">

<h5>Total Kontak</h5>

<h1>

<?= $total ?>

</h1>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card dashboard">

<div class="card-body">

<h5>Kategori</h5>

<h1>5</h1>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card dashboard">

<div class="card-body">

<h5>Status</h5>

<h1>Aktif</h1>

</div>

</div>

</div>

</div>

<?php

include 'footer.php';

?>