<?php
include "koneksi.php";
include "functions.php";

$filter = "";
if (isset($_GET['jurusan']) && $_GET['jurusan'] != "") {
    $jurusan = $_GET['jurusan'];
    $filter = "WHERE jurusan='$jurusan'";
}

$query = "SELECT * FROM mahasiswa $filter";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow rounded-4">
        <div class="card-body">

            <h3 class="text-center mb-4">📊 Data Mahasiswa</h3>

            <!-- FILTER -->
            <form method="GET" class="row g-2 mb-3">
                <div class="col-md-8">
                    <select name="jurusan" class="form-select">
                        <option value="">-- Semua Jurusan --</option>
                        <?php
                        foreach (getJurusan() as $j) {
                            echo "<option value='$j'>$j</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary w-100">Filter</button>
                </div>
            </form>

            <!-- TABEL -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jurusan</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>$no</td>
                                    <td>{$row['nama']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['jurusan']}</td>
                                  </tr>";
                            $no++;
                        }
                        ?>

                    </tbody>
                </table>
            </div>

            <div class="text-center mt-3">
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </div>

        </div>
    </div>

</div>

</body>
</html>