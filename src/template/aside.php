<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <img src="assets/dist/img/logo-laksana.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">Vendor</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
     
      <div class="info">
        <a href="#" class="d-block">Administrator</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="index.php" class="nav-link <?php if ($title == 'Sistem Pendukung Keputusan') echo 'active'; ?>">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-header">FITUR</li>
        <li class="nav-item">
          <a href="data-vendor.php" class="nav-link <?php if ($title == 'Data Vendor') echo 'active'; ?>">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Jenis Vendor
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="data-alternatif.php" class="nav-link <?php if ($title == 'Data Alternatif') echo 'active'; ?>">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Supplier
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="nilai-alternatif.php" class="nav-link <?php if ($title == 'Nilai Alternatif') echo 'active'; ?>">
            <i class="nav-icon fas fa-money-bill"></i>
            <p>
              NIlai VMS
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="data-kriteria.php" class="nav-link <?php if ($title == 'Data Kriteria') echo 'active'; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Kriteria
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="sub-kriteria.php" class="nav-link <?php if ($title == 'Sub Kriteria') echo 'active'; ?>">
            <i class="nav-icon fas fa-plus"></i>
            <p>
              Sub-Kriteria
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="perhitungan.php" onclick="<?php ranking() ?>" class="nav-link <?php if ($title == 'Perhitungan') echo 'active'; ?>">
            <i class="nav-icon fas fa-calculator"></i>
            <p>
              Hasil Perhitungan
            </p>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a href="laporan.php" class="nav-link <?php if ($title == 'laporan') echo 'active'; ?>">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Laporan
            </p>
          </a>
        </li> -->
        <li class="nav-item">
          <a href="logout.php" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>