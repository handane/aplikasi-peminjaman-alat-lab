<?php
require('../../database/db.php');
session_start();
if (!isset($_SESSION['admin'])) {
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
   <title>Admin</title>
   <!-- plugins:css -->
   <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
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

            <h3 class="title" style="color:#000;">Admin</h3>
         </div>
         <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background-color: rgba(42,184,73,1);">

            <ul class="navbar-nav navbar-nav-right">
               <li class="nav-item nav-profile" style="color: white;"><?php echo $_SESSION['admin']['nama'] ?></li>
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
                  <a href="data-peminjaman.php" class="nav-link" style="color:#fff; background-color:rgba(42,184,73,1);">Data Peminjaman</a>
               </li>
               <li class="nav-item">
                  <a href="data-mahasiswa.php" class="nav-link">Data Mahasiswa</a>
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
                           <h4 class="card-title">Daftar Pengajuan Peminjaman Alat</h4>
                           <div class="table-responsive">
                              <table id="datatablesSimple" class="table table-hover">
                                 <thead class="text-center">
                                    <tr>
                                       <th>No</th>
                                       <th>Status</th>
                                       <th>Nama Alat</th>
                                       <th>NIM</th>
                                       <th>Nama Mahasiswa</th>
                                       <th>tgl peminjaman</th>
                                       <th>tgl pengembalian</th>
                                       <th>No HP</th>
                                    </tr>
                                 </thead>
                                 <tbody class="text-center">
                                    <?php
                                    $no = 1;
                                    $pinjam = mysqli_query($conn, "SELECT * FROM pinjam ORDER BY id_pinjam DESC");
                                    if (mysqli_num_rows($pinjam) > 0) {
                                       while ($row = mysqli_fetch_array($pinjam)) {
                                    ?>
                                          <tr>
                                             <td><?php echo $no++; ?></td>
                                             <td>
                                                <?php
                                                if ($row['status'] == 'sudah disetujui') {
                                                ?>
                                                   <a class="btn btn-sm btn-warning" href="kembalikan-alat.php?id_pinjam=<?php echo $row['id_pinjam'] ?>&nama_alat=<?php echo $row['nama_alat'] ?>" onclick="return confirm('apakah <?php echo $row['nama_mahasiswa'] ?> telah mengembalikan alat')">Kembalikan Sekarang</a>
                                                <?php
                                                } else if ($row['status'] == 'dikembalikan') {
                                                ?>
                                                   <div style="color: green;">selesai</div>
                                                <?php
                                                } else {
                                                ?>
                                                   <div style="color: grey;">Menunggu</div>
                                                <?php } ?>
                                             </td>
                                             <td><?php echo $row['nama_alat']; ?></td>
                                             <td><?php echo $row['nim']; ?></td>
                                             <td><?php echo $row['nama_mahasiswa']; ?></td>
                                             <td><?php echo $row['tgl_peminjaman']; ?></td>
                                             <td><?php echo $row['tgl_pengembalian']; ?></td>
                                             <td><?php echo $row['no_telp']; ?></td>
                                          </tr>
                                    <?php }
                                    } ?>
                                 </tbody>
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
   <script src="../../bootstrap/js/bootstrap.min.js"></script>
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