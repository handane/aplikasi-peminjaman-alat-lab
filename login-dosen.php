<?php
require('database/db.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
  <section class="vh-100" style="background-color: rgba(30,125,52,1);">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <a href="index.html" style="color:white;">
          << kembali</a>
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                  <img src="images/LOGO UNMUL.png" alt="" class="align-center" width="150px">

                  <h3 class="mb-5">Login Dosen</h3>

                  <form action="" method="POST">
                    <div class="form-outline mb-4">
                      <input type="username" id="typeEmailX-2" class="form-control form-control-lg" name="username" placeholder="username" required />
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password" placeholder="password" required />
                    </div>

                    <div class="login">
                      <button class="btn btn-warning btn-lg btn-block" name="submit" type="submit">Masuk</button><br>
                    </div>
                  </form>
                  <?php
                  if (isset($_POST["submit"])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    if ($username != "" && $password != "") {
                      $ambil_dosen = mysqli_query($conn, "SELECT * FROM admin WHERE user_admin = '$username' AND pass_admin = '$password'");
                      $ambil_kepalalab = mysqli_query($conn, "SELECT * FROM kepalalab WHERE user_kepalalab = '$username' AND pass_kepalalab = '$password'");
                      $akun_admin = mysqli_num_rows($ambil_dosen);
                      $akun_kepalalab = mysqli_num_rows($ambil_kepalalab);
                      if ($akun_admin == 1) {
                        $admin = $ambil_dosen->fetch_assoc();
                        $_SESSION["admin"] = $admin;
                        echo "<script>location='app/admin/index.php';</script>";
                      }
                      if ($akun_kepalalab == 1) {
                        $kepalalab = $ambil_kepalalab->fetch_assoc();
                        $_SESSION["kepalalab"] = $kepalalab;
                        echo "<script>location='app/kepala-lab/index.php';</script>";
                      } else {
                  ?>

                        <div class="alert alert-danger alert-dismissible alert-atas"><img src="icons/exclamation-circle-fill.svg" alt="" style="margin-bottom: 3px;"> tidak dapat login, username atau password salah
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>

                  <?php
                      }
                    }
                  }
                  ?>
                </div>
              </div>
            </div>
      </div>
    </div>
  </section>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>