<?php
require('../../database/db.php');
session_start();
if (!isset($_SESSION['kepalalab'])) {
  echo "<script>window.location = '../../index.html'</script>";
}else{
  if (isset($_GET['id_admin'])) {
    $delete = mysqli_query($conn, "DELETE FROM admin WHERE id_admin = '" . $_GET['id_admin'] . "'");
    echo '<script>window.location="admin.php"</script>';
  }
}


