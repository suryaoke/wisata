<?php
session_start();

if (isset($_SESSION['id_user'])) {
    echo "<script>
    alert('Anda Sudah Login')
    window.location.href='assets/index.php'
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../assets/assets/img/logo/logo.png" rel="icon">
    <title>RuangAdmin - Login</title>
    <link href="../assets/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/assets/css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form class="user" action="proses_login.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="Masukkan Username" name="username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="MasukkanPassword" required>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                        <hr>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="font-weight-bold small" href="../login/register.php"> Create an Account! </a>
                                    </div>
                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <script src="../assets/assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../assets/assets/js/ruang-admin.min.js"></script>
</body>

</html>