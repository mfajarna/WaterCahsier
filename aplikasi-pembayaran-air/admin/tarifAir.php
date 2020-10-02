<?php

    error_reporting(0);
    session_start();

    include "../controller/koneksi.php";

    if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
        header('location:../login.php');
    }


    $dataAir = queryAir("SELECT * FROM tarif_air");

?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Aplikasi Pembayaran Air</title>

  <!-- Custom fonts for this template-->
  <link rel="icon" href="../assets/images/logo.png">
  <link href="../assets/fonts/font-awesome-4.7.0/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../assets/library/sb-admin-2.min.css" rel="stylesheet">
  <link href="../assets/library/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <i class="fas fa-users-cog"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Admin Panel</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="adminpanel.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="tarifAir.php">
        <i class="fas fa-dollar-sign"></i>
          <span>Tarif Air</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="pelanggan/pelanggan.php">
        <i class="fas fa-users"></i>
          <span>Pelanggan</span>
        </a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="history/history.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>History</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="tagihan/tagihan.php">
        <i class="fas fa-money-bill-wave"></i>
          <span>Tagihan</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="pembayaran/pembayaran.php">
        <i class="fas fa-cart-plus"></i>
          <span>Pembayaran</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">hi, <?php echo $_SESSION['nama'];  ?></span>
                <i class="fas fa-sliders-h"></i>
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
        <div class="container-fluid">
            <div class="col-xl-12 col-lg-10">
              <div class="card shadow mb-4">
              
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tarif Air</h6>
                </div>
                <div class="card-body">
                  <div class="table-resposive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Kode</th>
                                  <th>Nama Tarif</th>
                                  <th>Volume (M<sup>3</sup>)</th>
                                  <th>Harga (Rp)</th>
                                  <th>Beban (Rp)</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tfoot>
                                <tr>
                                  <th>No</th>
                                  <th>Kode</th>
                                  <th>Nama Tarif</th>
                                  <th>Volume (M<sup>3</sup>)</th>
                                  <th>Harga (Rp)</th>
                                  <th>Beban (Rp)</th>
                                  <th>Aksi</th>
                              </tr>
                          </tfoot>
                          <tbody>
                          <?php 
                $i = 1;
                foreach ($dataAir as $air): 
                ?>
                              <tr>
                                  <?php $air['id']; ?>
                                  <td><?= $i; ?></td>
                                  <td><?= $air['kode_air']; ?></td>
                                  <td><?= $air['nama_tarif']; ?></td>
                                  <td>> <?php echo $air['ukuran_awal']; ?> -  <?php echo $air['ukuran_akhir']; ?></td>
                                  <td><?= $air['harga']; ?></td>
                                  <td><?= $air['beban']; ?></td>
                                  <td><a href="ubahAir.php?id=<?php echo $air['id'];?>"><i class="far fa-edit"></i> </a> | <a href="hapusAir.php?id=<?php echo $air['id'];?>"><i class="fas fa-trash-alt"></i></a></td>
                              </tr>
                              <?php $i++; ?>
                              <?php endforeach; ?>
                          </tbody>
                      </table>
                  </div>
                 
                </div>
              </div>
              <a href="tambahTarifAir.php" class="btn btn-success btn-icon-split ">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data</span>
              </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin logout ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" untuk keluar dari halaman ini</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../assets/library/jquery/jquery-3.2.1.min.js"></script>
  <script src="../assets/library/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/library/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/library/sb-admin-2.min.js"></script>

  <script src="../assets/library/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/library/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/library/demo/datatables-demo.js"></script>

</body>

</html>
