<?php 
session_start();
include('../../database/db.php');
$kode_alat = $_GET['kode_alat'];
$get_alat = mysqli_query($conn, "SELECT * FROM alat WHERE kode_alat = '$kode_alat'");
$row_alat = mysqli_fetch_array($get_alat);
if(!isset($_SESSION['mahasiswa'])){
  echo '<script>window.location="../../index.html"</script>';
}if($row_alat['jumlah_alat'] < 1){
  echo "<script>alert('stok alat tidak tersedia')</script>";
  echo "<script>window.location='index.php'</script>";
}else{
    $id_mahasiswa = $_GET['id_mahasiswa'];
    $get_mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id_mahasiswa = '$id_mahasiswa'");
    $row_mahasiswa = mysqli_fetch_array($get_mahasiswa);
    $tgl_pinjam = date('d-m-Y');
    $add_pinjam = mysqli_query($conn, "INSERT INTO pinjam VALUE(
      null,
      '".$row_mahasiswa['nim']. "',
      '" . $row_mahasiswa['nama'] . "',
      '" . $row_alat['nama_alat'] . "',
      '" . $tgl_pinjam . "',
      '". "" . "',
      '" . $row_mahasiswa['telp'] . "',
      '"."belum disetujui"."'
      )");
      if ($add_pinjam) {
        $jumlah = $row_alat['jumlah_alat'] - 1;
        $update_jumlah = mysqli_query($conn, "UPDATE alat SET 
          jumlah_alat = '$jumlah'
          WHERE kode_alat = '".$row_alat['kode_alat']."'
        ");
        echo '<script>window.location="pengajuan-peminjaman.php"</script>';
      } else {
        echo '<script>alert("peminjaman gagal")</script>';
        echo '<script>window.location="index.php"</script>';
      }
    
}
