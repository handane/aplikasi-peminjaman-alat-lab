<?php
require('../../database/db.php');
session_start();
if (!isset($_SESSION['admin'])) {
  echo "<script>window.location = '../../index.html'</script>";
}
  $id_pinjam = $_GET['id_pinjam'];
  $nama_alat = $_GET['nama_alat'];
  $date = date('d-m-Y');
  $select_alat = mysqli_query($conn, "SELECT * FROM alat WHERE nama_alat = '$nama_alat'");
  $row_1 = mysqli_fetch_array($select_alat);
  $jumlah = $row_1['jumlah_alat'] + 1;
  $update = mysqli_query($conn, "UPDATE pinjam SET 
                    tgl_pengembalian = '$date',
                    status = 'dikembalikan'
                    WHERE id_pinjam = '$id_pinjam'");
  $update_2 = mysqli_query($conn, "UPDATE alat SET 
                    jumlah_alat = '$jumlah'
                    WHERE nama_alat = '$nama_alat'");
  echo '<script>window.location="data-peminjaman.php"</script>';

