<?php
require('../../database/db.php');
session_start();
if (!isset($_SESSION['admin'])) {
  echo "<script>window.location = '../../index.html'</script>";
}

if (isset($_GET['kode_alat'])) {
  $sql2 = mysqli_query($conn, "SELECT * FROM alat WHERE kode_alat = '" . $_GET['kode_alat'] . "'");
  $datafl = mysqli_fetch_assoc($sql2);
  $foto = $datafl['foto_alat'];
  if (file_exists("./foto/$foto")) {
    unlink("./foto/$foto");
  }
  $delete1 = mysqli_query($conn, "DELETE FROM alat WHERE kode_alat = '" . $_GET['kode_alat'] . "'");
  echo '<script>window.location="index.php"</script>';
}

if (isset($_GET['id_mahasiswa'])) {
  $id_mahasiswa = $_GET['id_mahasiswa'];
  $delete_m = mysqli_query($conn, "DELETE FROM mahasiswa WHERE id_mahasiswa = '$id_mahasiswa'");
  echo '<script>window.location="data-mahasiswa.php"</script>';
}

