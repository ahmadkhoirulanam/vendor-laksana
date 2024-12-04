<?php
$dataAlternatif = mysqli_query($conn, "SELECT * FROM jenis");
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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="col">
                <h3 class="card-title"><?= $title ?> </h3>
              </div>
              <div class="col text-right">
                <a href="?m=add" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="datatable" class="table table-bordered table-hover">
                  <thead>
                    <tr class="table-primary">
                      <th style="width:5%;"></th>
                      <!-- <th>Kode Alternatif</th> -->
                      <th>Jenis Vendor</th>
                      <th>Supplier</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 0;
                    while ($d = mysqli_fetch_assoc($dataAlternatif)): ?>
                      <tr>
                        <td><?= ++$i ?></td>
                        <!-- <td><?= $d["id_jenis"] ?></td> -->
                        <td><?= $d["nm_jenis"] ?></td>
                        <?php
                        $id_vendor = $d["id_jenis"];
                        $jmlAlternatifa = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM alternatif where id_jenis= $id_vendor")) ?>
                        <td align="center"><span class="badge bg-success" style="width: 100px; text-align: center;"><?php echo $jmlAlternatifa?></span></td>
                        <td>
                        <a href="data-alternatif.php?id=<?= $d['id_jenis'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Lihat Data Supplier</a>
                          <a href="?m=edit&id=<?= $d['id_jenis'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <a href="?hapus=alternatif&id=<?= $d['id_jenis'] ?>" onclick="return confirm('Hapus Data Alternatif?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                      </tr>
                    <?php endwhile ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card-body -->
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