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

  

  <!--  -->
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
                <!-- <a href="" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a> -->
              </div>
            </div>

            <?php
              $alternatif = query("SELECT * FROM alternatif LEFT JOIN ranking ON alternatif.id_alternatif = ranking.id_alternatif LEFT JOIN jenis ON alternatif.id_jenis = jenis.id_jenis ORDER BY skor DESC;");
              $cAlternatif = count($alternatif);
              $jmlbobot = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(bobot) as normalisasi FROM kriteria"));
              $dataKriteria = mysqli_query($conn, "SELECT * FROM kriteria");
            ?>

            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="datatable" class="table table-bordered ">
                  <thead>
                    <tr class="table-primary">
                      <!-- <th></th> -->
                      <th>Alternatif</th>
                      <?php while ($kriteria = mysqli_fetch_assoc($dataKriteria)) : ?>
                        <?php //var_dump($kriteria); 
                        ?>
                        <th><?= $kriteria['nm_kriteria'] ?></th>
                      <?php endwhile ?>
                      <th>Total</th>
                      <th>Rank</th>
                      <th>jenis</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $r = 1;
                    for ($a = 0; $a < $cAlternatif; $a++) : ?>
                      <tr>
                        <td><?= $alternatif[$a]['nm_alternatif'] ?></td>
                        <?php
                        $idAlternatif = $alternatif[$a]['id_alternatif'];
                        $dataNilaiAlternatif = query("SELECT * FROM nilai_alternatif LEFT JOIN kriteria ON nilai_alternatif.id_kriteria = kriteria.id_kriteria JOIN sub_kriteria ON nilai_alternatif.id_subkriteria = sub_kriteria.id_subkriteria WHERE id_alternatif = $idAlternatif");
                        $cdataNilaiAlternatif = count($dataNilaiAlternatif);
                        // var_dump($alternatif);

                        $hasil = [];
                        $hasilrank = [];
                        $nilai = [];
                        for ($i = 0; $i < $cdataNilaiAlternatif; $i++) :
                        ?>
                          <?php
                          $normalisasi = $dataNilaiAlternatif[$i]['bobot'] / $jmlbobot['normalisasi'];
                          // $nilai[$i] = (($dataNilaiAlternatif[$i]['nilai']-20)/80);
                          $nilai[$i] = (($dataNilaiAlternatif[$i]['nilai'] - 20) / 80) * $normalisasi;
                          // var_dump($normalisasi);
                          //var_dump($nilaiAlternatif); 
                          ?>
                          <td><?= $nilai[$i]  ?></td>
                        <?php endfor ?>
                        <?php
                        $rank = [];
                        $hasil[$a] = array_sum($nilai);
                        ?>
                        <td><?= $hasil[$a] ?></td>
                        <td><?= $r++ ?></td>
                        <td><?= $alternatif[$a]['nm_jenis'] ?></td>

                        <td>
                          <?php
                          if ($hasil[$a] >= 0.5) { ?>
                            <span class="badge bg-success" style="display: inline-block; width: 100px; text-align: center;">Bisa</span><?php
                                                                                                                                      } else { ?>
                            <span class="badge bg-danger" style="display: inline-block; width: 100px; text-align: center;">Tidak Bisa</span><?php
                                                                                                                                          }
                                                                                                                                            ?>
                        </td>


                      </tr>
                    <?php endfor ?>
                  </tbody>
                </table>
              </div>
            </div>

            
            <!-- /.card-body -->
          </div>
          <!--  -->
          <!--  -->
          <!--  -->
        </div>
        <!-- /.col -->
      </div>
    </div><!--/. container-fluid -->
  </section>


  <?php
// Ambil semua data jenis
$dataJenis = query("SELECT * FROM jenis");

// Looping berdasarkan jenis
foreach ($dataJenis as $jenis) :
    $idJenis = $jenis['id_jenis'];
    $nmJenis = $jenis['nm_jenis'];

    // Ambil data alternatif berdasarkan id_jenis
    $alternatif = query("SELECT * FROM alternatif 
                         LEFT JOIN ranking ON alternatif.id_alternatif = ranking.id_alternatif 
                         WHERE alternatif.id_jenis = $idJenis 
                         ORDER BY skor DESC");
    $cAlternatif = count($alternatif);
    $jmlbobot = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(bobot) as normalisasi FROM kriteria"));
    $dataKriteria = mysqli_query($conn, "SELECT * FROM kriteria");
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Jenis: <?= $nmJenis ?> </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered">
                                <thead>
                                    <tr class="table-primary">
                                        <th>Alternatif</th>
                                        <?php while ($kriteria = mysqli_fetch_assoc($dataKriteria)) : ?>
                                            <th><?= $kriteria['nm_kriteria'] ?></th>
                                        <?php endwhile ?>
                                        <th>Total</th>
                                        <th>Rank</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $r = 1;
                                    foreach ($alternatif as $alt) : ?>
                                        <tr>
                                            <td><?= $alt['nm_alternatif'] ?></td>
                                            <?php
                                            $idAlternatif = $alt['id_alternatif'];
                                            $dataNilaiAlternatif = query("SELECT * FROM nilai_alternatif 
                                                                          LEFT JOIN kriteria ON nilai_alternatif.id_kriteria = kriteria.id_kriteria 
                                                                          JOIN sub_kriteria ON nilai_alternatif.id_subkriteria = sub_kriteria.id_subkriteria 
                                                                          WHERE id_alternatif = $idAlternatif");
                                            $cdataNilaiAlternatif = count($dataNilaiAlternatif);

                                            $nilai = [];
                                            for ($i = 0; $i < $cdataNilaiAlternatif; $i++) :
                                                $normalisasi = $dataNilaiAlternatif[$i]['bobot'] / $jmlbobot['normalisasi'];
                                                $nilai[$i] = (($dataNilaiAlternatif[$i]['nilai'] - 20) / 80) * $normalisasi;
                                            ?>
                                                <td><?= $nilai[$i] ?></td>
                                            <?php endfor ?>
                                            <?php
                                            $hasil = array_sum($nilai);
                                            ?>
                                            <td><?= $hasil ?></td>
                                            <td><?= $r++ ?></td>
                                            <td>
                                                <?php
                                                if ($hasil >= 0.5) { ?>
                                                    <span class="badge bg-success" style="width: 100px; text-align: center;">Bisa</span>
                                                <?php } else { ?>
                                                    <span class="badge bg-danger" style="width: 100px; text-align: center;">Tidak Bisa</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endforeach; ?>


  
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->