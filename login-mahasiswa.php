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
  <section class="vh-100" style="background-color: rgba(2,11,133,1);">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <a href="index.html" style="color:white;">
          << kembali</a>
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                  <img src="images/LOGO UNMUL.png" alt="" class="align-center" width="150px">

                  <h3 class="mb-5">Login Mahasiswa</h3>

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
                    <button type="button" style="background: none;border:none;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Daftar</button>
                  </form>
                  <!-- tanggapan -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h6>Registrasi Mahasiswa</h6>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST">
                          <div class="modal-body">
                            <div class="mb-3">
                              <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="nim_baru" placeholder="NIM">
                              <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="nama_baru" placeholder="Nama Lengkap">
                              <select name="jeniskelamin_baru" class="form-control mt-3" id="recipient-name" autocomplete="off" id="">
                                <option>-- Jenis Kelamin --</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                              </select>
                              <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="fakultas_baru" placeholder="fakultas">
                              <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="prodi_baru" placeholder="prodi">
                              <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="kelas_baru" placeholder="Kelas">
                              <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="alamat_baru" placeholder="alamat">
                              <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="telp_baru" placeholder="telp">
                              <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="user_baru" placeholder="Username">
                              <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="pass_baru" placeholder="Password">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" name="regist" value="Daftar">
                          </div>
                        </form>
                        <?php
                        // include_once("db.php");
                        if (isset($_POST["regist"])) {
                          $nim_baru = $_POST['nim_baru'];
                          $nama_baru = $_POST['nama_baru'];
                          $jeniskelamin_baru = $_POST['jeniskelamin_baru'];
                          $fakultas_baru = $_POST['fakultas_baru'];
                          $prodi_baru = $_POST['prodi_baru'];
                          $kelas_baru = $_POST['kelas_baru'];
                          $alamat_baru = $_POST['alamat_baru'];
                          $telp_baru = $_POST['telp_baru'];
                          $user_baru = $_POST['user_baru'];
                          $pass_baru = $_POST['pass_baru'];
                          $cek_regist = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE user_mahasiswa = '$user_baru'");
                          if (mysqli_num_rows($cek_regist) == 0 ) {
                            $get_regist = mysqli_query($conn, "INSERT INTO mahasiswa VALUE(
                                null,
                                '" . $nim_baru . "',
                                '" . $nama_baru . "',
                                '" . $user_baru . "',
                                '" . $pass_baru . "',
                                '" . $jeniskelamin_baru . "',
                                '" . $kelas_baru . "',
                                '" . $alamat_baru . "',
                                '" . $fakultas_baru . "',
                                '" . $prodi_baru . "',
                                '" . $telp_baru . "'
                            )");
                            if ($get_regist) {
                              echo '<script>alert("akun berhasil dibuat")</script>';
                            } else {
                              echo '<script>alert("akun gagal dibuat")</script>';
                            }
                          } else {
                            echo '<script>alert("Gagal, akun sudah terdaftar")</script>';
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                  <?php
                  if (isset($_POST["submit"])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    if ($username != "" && $password != "") {
                      $ambil = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE user_mahasiswa = '$username' AND pass_mahasiswa = '$password'");
                      $akun = mysqli_num_rows($ambil);
                      if ($akun == 1) {
                        $mahasiswa = $ambil->fetch_assoc();
                        $_SESSION["mahasiswa"] = $mahasiswa;
                        echo "<script>location='app/mahasiswa/index.php';</script>";
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