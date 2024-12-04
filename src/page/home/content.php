<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?= $title; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active"><?= $title; ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!--  -->
  <?php
  $jmlAlternatif = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM alternatif"));
  $jmlKriteria = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kriteria"));
  $lolos = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `ranking` WHERE `skor` >= 0.5;"));
  $nololos = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `ranking` WHERE `skor` < 0.5;"));

  $_SESSION['bisa'] = $lolos; 
  $_SESSION['tidakbisa'] = $nololos; 
  
  ?>
  <!--  -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-info"></i> Selamat Datang</h5>
        Sistem Pendukung Keputusan Berbasis Website untuk Pemberian Pinjaman Menggunakan Metode implementasi pada System Berbasis Algoritma SMART untuk Optimasi Pemilihan Vendor pada Industri Karoseri Laksana
      </div>
      <!-- Info boxes -->
      <div class="row">
        <div class="col-lg-6 col-6">

          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $jmlAlternatif ?></h3>
              <p>Supplier</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-6 col-6">

          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $jmlKriteria ?><sup style="font-size: 20px"></sup></h3>
              <p>Kriteria</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

       

      </div>
      <!-- /.row -->


    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->