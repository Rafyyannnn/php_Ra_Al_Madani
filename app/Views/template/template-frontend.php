<?php

$db = \Config\Database::connect();


$setting = $db->table('tbl_setting')
  ->where('id', '1')
  ->get()->getRowArray();

$ta = $db->table('tbl_ta')
  ->where('status', '1')
  ->get()->getRowArray();

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <style>
  html, body {
    height: 100%;
  }

  .wrapper {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }

  .content-wrapper {
    flex: 1;
  }
</style>  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?> | <?= $subtitle ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
        <a href="<?= base_url('home') ?>" class="navbar-brand">
          <img src="<?= base_url() ?>/logo/<?= $setting['logo'] ?>" width="50px" height="50px">
          <span class="brand-text font-weight-light"><b>PPDB Online <?= $setting['nama_sekolah'] ?></b></span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="<?= base_url() ?>" class="nav-link">Home</a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">Petunjuk</a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">About</a>
            </li>
          </ul>
        </div>
        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <li class="nav-item">
            <?php if (session()->get('ids') == "") { ?>
              <a class="nav-link" href="<?= base_url('auth/loginSiswa') ?>">
                <i class="fas fa-user"></i> Login
              </a>
            <?php } else { ?>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
              <i class="fas fa-user"></i> <?= session()->get('nama_lengkap') ?></a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="<?= base_url('Siswa')?>" class="dropdown-item">Biodata</a></li>
              <li class="dropdown-divider"></li>
              <li><a href="<?= base_url('Auth/logout_siswa') ?>" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout </a></li>
            </ul>
          </li>
        <?php } ?>

        </li>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper flex-grow-1">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <?php if ($ta && $ta['status'] != '1') { ?>
                <h1> Pendaftaran Sudah Di Tutup !!! </h1>
              <?php } elseif ($ta) { ?>
                <h1 class="m-0"> Pendaftaran Tahun Ajaran <?= $ta['ta'] ?></h1>
              <?php } else { ?>
                <h1 class="m-0 text-danger"><b>Pendaftaran Tahun ini Sudah Di Tutup !!!</b></h1>
              <?php } ?>
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
          <div class="container">
            <div class="row">

  <?= $this->renderSection('content') ?>

</div> <!-- Tutup div.row -->

</div> <!-- Tutup div.container -->
</div> <!-- Tutup div.content -->
</div> <!-- Tutup div.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer mt-auto">
  <!-- To the right -->
  <div class="float-right d-none d-sm-inline">
    Anything you want
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; <?= date('Y') ?> <a href="<?= $setting['web'] ?>"><?= $setting['nama_sekolah'] ?></a>.</strong> All rights reserved.
</footer>

    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/AdminLTE/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>/AdminLTE/dist/js/demo.js"></script>
</body>

</html>