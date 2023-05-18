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
  <title>Cetak</title>
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
      font-family: 'Calibri', sans-serif;
    }
    table {
      width: 100%;
    }
    table tr th, td {
      padding: 5px;
      border: 1px solid #000;
      border-collapse: collapse;
    }
    th, td {
      font-size: 12px;
    }
    

    @media only screen and (max-width: 600px) {
      .title {
        display: none;
      }
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="text-center pb-5 mt-5">
      <h3 class="mb-5 pt-5 pb-3">Daftar Peminjaman Alat Lab</h3>
      <table class="text-center m-auto">
        <tr>
          <th>No</th>
          <th>Nama Alat</th>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Jumlah</th>
          <th>tanggal peminjaman</th>
          <th>tanggal pengembalian</th>
          <th>No HP</th>
        </tr>
        <?php
        $no = 1;
        $geti =  mysqli_query($conn, "SELECT * FROM pinjam");
        while ($row = mysqli_fetch_array($geti)) {
        ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['nama_alat']; ?></td>
            <td><?php echo $row['nim']; ?></td>
            <td><?php echo $row['nama_mahasiswa']; ?></td>
            <td><?php echo $row['jumlah']; ?></td>
            <td><?php echo $row['tgl_peminjaman']; ?></td>
            <td><?php echo $row['tgl_pengembalian']; ?></td>
            <td><?php echo $row['no_telp']; ?></td>
          </tr>
        <?php } ?>

      </table>
    </div>

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