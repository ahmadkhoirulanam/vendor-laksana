<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Rekapitlasi Supplier</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <div class="content-wrapper">

      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Rekapitlasi Supplier</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Rekapitlasi Supplier</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">

              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Rekapitlasi Supplier</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>

             

            </div>

            <div class="col-md-6">

              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Rekapitlasi Supplier</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>

    </div>

    
    
    </aside>

  </div>
  <?php
session_start();
$lolos = isset($_SESSION['bisa']) ? $_SESSION['bisa'] : 0;
$nololos = isset($_SESSION['tidakbisa']) ? $_SESSION['tidakbisa'] : 0;
?>

  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/plugins/chart.js/Chart.min.js"></script>
  <script src="assets/dist/js/adminlte.min.js?v=3.2.0"></script>
  <script src="assets/dist/js/demo.js"></script>

  <script>
    $(function() {
      //-------------
      //- DONUT CHART -
      //-------------
      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
      var lolos = <?php echo json_encode($lolos); ?>;
      var nololos = <?php echo json_encode($nololos); ?>;
      var donutData = {
        labels: [
          'Tidak Bisa',
          'Bisa',
          
        ],
        datasets: [{
          data: [nololos, lolos],
          backgroundColor: ['#f56954', '#00a65a'],
        }]
      }
      var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }
      var donutChart = new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      })

      //-------------
      //- BAR CHART -
      //-------------
      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var lineChartData = {
        labels: ['Hasil Perhitungan'],
        datasets: [{
            label: 'Tidak bisa',
            backgroundColor: 'rgba(60,141,188,0.9)',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: [nololos,lolos]
          },
          {
            label: 'Bisa',
            backgroundColor: 'rgba(210, 214, 222, 1)',
            borderColor: 'rgba(210, 214, 222, 1)',
            pointRadius: false,
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [8, 30, 3]
          },
        ]

      }
      var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
      }
      var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: lineChartData,
        options: barChartOptions
      })
    })
  </script>
</body>

</html>
