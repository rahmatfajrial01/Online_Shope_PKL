<?php session_start();
//koneksi ke database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <!--navbar-->
    <?php include 'menu.php'; ?>


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Silahkan Login!</h1>
                                    </div>

                                    <form role="form" class="user" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="email" placeholder="Masukan Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <!-- <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div> -->
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" name="login"> Login </button>
                                    </form>


                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> -->
                                    <div class="text-center">
                                        <a class="small" href="daftar.php">Belum Punya Akun? Silahkan Buat Akun!</a>
                                    </div>
                                    <?php
                                    if (isset($_POST["login"])) {

                                        $email = $_POST["email"];
                                        $password = $_POST["password"];

                                        // cek query di table pelanggan
                                        $ambil = $koneksi->query("SELECT * FROM t_pelanggan 
                                        WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

                                        $akunyangcocok = $ambil->num_rows;
                                        if ($akunyangcocok == 1) {
                                            $akun = $ambil->fetch_assoc();
                                            $_SESSION["pelanggan"] = $akun;
                                            echo "<script>alert('anda sukses login');</script>";
                                            // jika sudah belanja
                                            if (isset($_SESSION["keranjang"]) or !empty($_SESSION["keranjang"])) {
                                                echo "<script> location='checkout.php' ; </script>";
                                            } else {
                                                echo "<script> location='index.php' ; </script>";
                                            }
                                        } else {
                                            //gagal login
                                            echo "<script>alert('anda gagal login');</script>";
                                            echo "<script> location='login.php' ; </script>";
                                        }
                                    }

                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>