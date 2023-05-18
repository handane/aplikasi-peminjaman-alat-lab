<?php
require('../../database/db.php');
session_start();
if (!isset($_SESSION['mahasiswa'])) {
  echo "<script>window.location = '../../index.html'</script>";
}
?>
<img src="" alt="">
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mahasiswa</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/LOGO UNMUL.png" />
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <script src="../../datatables/datatable.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    * {
      font-family: 'Poppins', sans-serif;
    }

    @media only screen and (max-width: 600px) {
      .title {
        display: none;
      }
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background-color: #fff; border-bottom: solid grey">

        <h3 class="title" style="color:#000;">Mahasiswa</h3>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background-color: rgba(42,184,73,1);;">

        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile" style="color: white;"><?php echo $_SESSION['mahasiswa']['nama'] ?></li>
          <li class="nav-item nav-profile"><a href="logout.php" style="color: #fff">Logout</a></li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas" id="sidebarToggle" href="#!">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Alat Laboratorium</a>
          </li>
          <li class="nav-item">
            <a href="pengajuan-peminjaman.php" style="color:#fff; background-color:rgba(42,184,73,1);" class="nav-link">pengajuan Peminjaman</a>
          </li>
          <li class="nav-item">
            <a href="profil.php" class="nav-link">My Profil</a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Pengajuan Peminjaman Alat Laboratorium</h4>
                  <div class="table-responsive">
                    <div class="row">
                      <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <?php
                            $id_mahasiswa = $_SESSION['mahasiswa']['id_mahasiswa'];
                            $data_mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id_mahasiswa = '$id_mahasiswa'");
                            $row1 = mysqli_fetch_array($data_mahasiswa);
                            ?>
                            <form action="" method="POST">
                              <div class="row">
                                <label class="form-control border-0 col-md-3">
                                  <h6>Nama Mahasiswa</h6>
                                </label>
                                <input type="text" class="form-control mb-3 col-md-5" id="recipient-name" autocomplete="off" name="nama_mahasiswa" value="<?php echo $row1['nama'] ?>" readonly>
                              </div>
                              <div class="row">
                                <label class="form-control border-0 col-md-3">
                                  <h6>NIM Mahasiswa</h6>
                                </label>
                                <input type="text" class="form-control mb-3 col-md-5" id="recipient-name" autocomplete="off" name="nim" value="<?php echo $row1['nim'] ?>" readonly>
                              </div>
                              <div class="row">
                                <label class="form-control border-0 col-md-3">
                                  <h6>Nomor HP</h6>
                                </label>
                                <input type="text" class="form-control mb-3 col-md-5" id="recipient-name" autocomplete="off" name="no_telp" value="<?php echo $row1['telp'] ?>">
                              </div>
                              <div class="row">
                                <label class="form-control border-0 col-md-3">
                                  <h6>Pilih Alat</h6>
                                </label>
                                <select name="nama_alat" id="" class="form-control mb-3 col-md-5">
                                  <?php
                                  $data = mysqli_query($conn, "SELECT * FROM alat");
                                  if (mysqli_num_rows($data) > 0) {
                                    while ($row3 = mysqli_fetch_array($data)) {
                                  ?>
                                      <option value="<?php echo $row3['nama_alat'] ?>"><?php echo $row3['nama_alat'] ?></option>
                                  <?php }
                                  } ?>
                                </select>
                              </div>
                              <div class="row">
                                <label class="form-control border-0 col-md-3">
                                  <h6>Jumlah</h6>
                                </label>
                                <input type="number" class="form-control mb-3 col-md-5" min="0" max="1000" id="recipient-name" autocomplete="off" name="jumlah" required>
                              </div>
                              <div class="row">
                                <label class="form-control border-0 col-md-3">
                                  <h6>Tanggal Peminjaman</h6>
                                </label>
                                <input type="date" class="form-control mb-3 col-md-2" id="recipient-name" autocomplete="off" name="tgl_peminjaman" style="border-radius: 0;" required><label class="form-control mb-3 text-center col-md-2 border-0 btn-info" style="border-radius: 0;">Sampai</label><input type="date" class="form-control mb-3 col-md-2" id="recipient-name" autocomplete="off" name="tgl_pengembalian" style="border-radius: 0;" required>
                              </div>

                              <input type="submit" class="btn btn-sm btn-primary mt-4" name="pinjam" value="Submit">
                            </form>
                            <?php
                            if (isset($_POST['pinjam'])) {
                              $nama_mahasiswa = $_POST['nama_mahasiswa'];
                              $nim = $_POST['nim'];
                              $no_telp = $_POST['no_telp'];
                              $nama_alat = $_POST['nama_alat'];
                              $jumlah = $_POST['jumlah'];
                              $tgl_peminjaman = $_POST['tgl_peminjaman'];
                              $tgl_pengembalian = $_POST['tgl_pengembalian'];
                              $status = "belum disetujui";

                              $cek_stok = mysqli_query($conn, "SELECT * FROM alat WHERE nama_alat = '$nama_alat'");
                              $row4 = mysqli_fetch_array($cek_stok);
                              $stok_alat = $row4['jumlah_alat'];
                              if ($jumlah <= $stok_alat) {
                                $kurangiAlat = $stok_alat - $jumlah;
                                $update_alat = mysqli_query($conn, "UPDATE alat SET 
                                  jumlah_alat = '$kurangiAlat' 
                                  WHERE nama_alat = '$nama_alat'
                                ");
                                $insert_alat = mysqli_query($conn, "INSERT INTO pinjam VALUE( 
                                  null,
                                  '" . $nim . "',
                                  '" . $nama_mahasiswa . "',
                                  '" . $nama_alat . "',
                                  '" . $jumlah . "',
                                  '" . $tgl_peminjaman . "',
                                  '" . $tgl_pengembalian . "',
                                  '" . $no_telp . "',
                                  '" . $status . "')");

                                if ($update_alat and $insert_alat) {
                                  echo '<script>alert("data peminjaman berhasil dikirim")</script>';
                                  echo '<script>window.location="pengajuan-peminjaman.php"</script>';
                                }
                              } else {
                                echo '<script>alert("gagal, stok tidak cukup")</script>';
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
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <!-- <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
                  <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span> -->
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../vendors/chart.js/Chart.min.js"></script>
  <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/dashboard.js"></script>
  <script src="../js/Chart.roundedBarCharts.js"></script>
  <script src="../../js/datatables-simple-demo.js"></script>
  <!-- End custom js for this page-->
</body>

</html>