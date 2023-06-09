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
  <link rel="shortcut icon" href="../images/favicon.png" />
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

    tr,
    th,
    td {
      padding: 5px;
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
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background-color: rgba(42,184,73,1);">

        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile" style="color: white;"><?php echo $_SESSION['mahasiswa']['nama'] ?></li>
          <li class="nav-item nav-profile"><a href="logout.php" style="color: #fff;">Logout</a></li>
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
            <a href="pengajuan-peminjaman.php" class="nav-link">pengajuan Peminjaman</a>
          </li>
          <li class="nav-item">
            <a href="Profil.php" class="nav-link" style="color:#fff; background-color:rgba(42,184,73,1);">My Profil</a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <h4 class="card-title">Profil</h4>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <?php
                  $id_mahasiswa = $_SESSION['mahasiswa']['id_mahasiswa'];
                  $profil = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id_mahasiswa = '$id_mahasiswa'");
                  $row = mysqli_fetch_array($profil);
                  ?>
                  <a href="edit-data.php?id_mahasiswa=<?php echo $row['id_mahasiswa'] ?>" class="btn btn-sm btn-success">Edit</a>
                  <div class="table-responsive">
                    <table class="m-3 p-3">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <td>:</td>
                          <td><?php echo $row['nama'] ?></td>
                        </tr>
                        <tr>
                          <th>NIM</th>
                          <td>:</td>
                          <td><?php echo $row['nim'] ?></td>
                        </tr>
                        <tr>
                          <th>Jenis Kelamin</th>
                          <td>:</td>
                          <td><?php echo $row['jenis_kelamin'] ?></td>
                        </tr>
                        <tr>
                          <th>Kelas</th>
                          <td>:</td>
                          <td><?php echo $row['kelas'] ?></td>
                        </tr>
                        <tr>
                          <th>Prodi</th>
                          <td>:</td>
                          <td><?php echo $row['prodi'] ?></td>
                        </tr>
                        <tr>
                          <th>Fakultas</th>
                          <td>:</td>
                          <td><?php echo $row['fakultas'] ?></td>
                        </tr>
                        <tr>
                          <th>Alamat</th>
                          <td>:</td>
                          <td><?php echo $row['alamat'] ?></td>
                        </tr>
                        <tr>
                          <th>No Telepon</th>
                          <td>:</td>
                          <td><?php echo $row['telp'] ?></td>
                        </tr>
                      </thead>
                    </table>
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
  <!-- End custom js for this page-->
</body>

</html>