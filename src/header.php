<?php
session_start();
if ($_SESSION['status'] == "") {
  header("location:../index.php?pesan=gagal");
  $id_user = $_SESSION['id_user'];
}
include 'koneksi.php';

$sql  = mysqli_query($koneksi, "SELECT * FROM data_user WHERE id_user = '$_SESSION[id_user]'");
$kk   = mysqli_fetch_array($sql);
$user = $kk['username'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Pemilihan Perusahaan Outsourcing dengan Metode SAW</title>

  <!-- Custom fonts for this template -->
  <link rel="stylesheet" type="text/css" href="../assets/semantic/semantic.min.css">
  <link href="../assets/bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../assets/bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

  <link href="../assets/pagination.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../assets/bootstrap/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Semantic here -->
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
  <script src="../assets/semantic/semantic.min.js"></script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SPK Outsourcing</div>
      </a>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data
      </div>
      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="data_user.php">
          <i class="fas fa-fw fa-user"></i>
          <span>User</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="data_kriteria.php">
          <i class="fas fa-server"></i>
          <span>Kriteria</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="data_outsourcing.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Outsourcing</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="data_nilai.php">
          <i class="fas fa-sort-numeric-down"></i>
          <span>Nilai Outsourcing</span></a>
      </li>
      <div class="sidebar-heading">
        Hasil
      </div>
      <li class="nav-item active">
        <a class="nav-link" href="data_hasil.php">
          <i class="fas fa-th-list"></i>
          <span>Hasil SAW</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">



            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user ?></span>
                <img class="img-profile rounded-circle" src="../assets/img/12.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->