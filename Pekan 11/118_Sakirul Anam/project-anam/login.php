<?php 
include 'koneksi.php';
session_start();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($login);

    if($cek > 0){
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("location:index.php");
    } else {
        $error = "Username atau Password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login - CRUD Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Login Admin</h4>
                    </div>
                    <div class="card-body">
                        <?php if(isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
                        <form method="post">
                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>