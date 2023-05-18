<?php
require('../../database/db.php');
session_start();
if (!isset($_SESSION['mahasiswa'])) {
  echo "<script>window.location = '../../index.html'</script>";
}
  $nama_alat = $_GET['nama_alat'];
  $id_pinjam = $_GET['id_pinjam'];
  $select_alat = mysqli_query($conn, "SELECT * FROM alat WHERE nama_alat = '$nama_alat'");
  $row_1 = mysqli_fetch_array($select_alat);
  $select_pinjam = mysqli_query($conn, "SELECT * FROM pinjam WHERE id_pinjam = '$id_pinjam'");
  $row_3 = mysqli_fetch_array($select_pinjam);
  $jumlah = $row_1['jumlah_alat'] + $row_3['jumlah'];
  $update_alat = mysqli_query($conn, "UPDATE alat SET 
          jumlah_alat = '$jumlah'
          WHERE nama_alat = '" . $row_1['nama_alat'] . "'
        ");
  $delete1 = mysqli_query($conn, "DELETE FROM pinjam WHERE id_pinjam = '$id_pinjam'");
  if($update_alat AND $delete1){
    echo '<script>window.location="pengajuan-peminjaman.php"</script>';
  }
