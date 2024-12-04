<?php
if (isset($_POST['simpan'])) {
  if (insertAlternatif($_POST) > 0) {
    echo "<script>
            alert('Data Alternatif Berhasil Ditambah');
            document.location.href = 'data-alternatif.php';
          </script>";
  } else {
    echo "<script>
            alert('Data Alternatif Gagal Ditambah');
            document.location.href = 'data-alternatif.php?m=add';
          </script>";
  }
}
?>

<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
}
?>



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

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-8">
          <!-- general form elements -->
          <a href="data-alternatif.php" class="btn btn-primary btn-sm mb-2"><i class="fas fa-angle-double-left"></i> Kembali</a>
          <div class="card card-primary">
            <div class="card-header">
              <div class="col">
                <h3 class="card-title">Tambah <?= $title ?> </h3>
              </div>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form role="form" action="" method="POST">
              <div class="card-body">
                <!-- <div class="form-group">
                    <label for="kd_alternatif">Kode Alternatif</label>
                    <input type="text" class="form-control" id="kd_alternatif" name="kd_alternatif">
                  </div> -->
                <div class="form-group">
                  <label for="alternatif">Alternatif</label>
                  <input type="text" class="form-control" id="alternatif" name="alternatif">
                </div>

                <div class="form-group">
                  <?php
                  // Jika $id kosong atau lebih kecil dari atau sama dengan 1
                  if (empty($id) || $id <= 1):
                    // Lakukan query untuk mengambil data jenis dari tabel 'jenis'
                    $query = "SELECT * FROM jenis"; // Query untuk mengambil data dari tabel jenis
                    $result = mysqli_query($conn, $query); // Menjalankan query

                    if (mysqli_num_rows($result) > 0): // Jika ada data
                  ?>
                      <label for="alternatif">Jenis Vendor</label>
                      <select class="form-control" id="id_jenis" name="id_jenis">
                        <option value="">Pilih Jenis Vendor</option> <!-- Opsi pertama -->
                        <?php
                        // Loop untuk menampilkan opsi dropdown
                        while ($row = mysqli_fetch_assoc($result)):
                          $selected = ($row['id_jenis'] == $id) ? 'selected' : ''; // Memeriksa apakah id_jenis sama dengan $id
                        ?>
                          <option value="<?php echo $row['id_jenis']; ?>" <?php echo $selected; ?>>
                            <?php echo $row['nm_jenis']; ?> <!-- Tampilkan nama jenis -->
                          </option>
                        <?php endwhile; ?>
                      </select>
                    <?php
                    else:
                      echo "Data jenis tidak tersedia.";
                    endif;
                  else:
                    // Jika $id ada dan lebih besar dari 1, gunakan input hidden
                    ?>
                    <input type="hidden" id="alternatif" name="id_jenis" value="<?php echo $id; ?>">
                  <?php endif; ?>
                </div>



              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->