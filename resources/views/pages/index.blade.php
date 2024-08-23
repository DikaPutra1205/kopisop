@include('layout.head');

<body>
  @include('layout.header');
  @include('layout.sidebar');

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Home</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    @if (Auth::user()->id_level == 3 || Auth::user()->id_level == 1)

    <section class="section dashboard">
      <!-- Reports -->
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Laporan Saldo <span>/ 7 Hari Terakhir</span></h5>

            <!-- Line Chart -->
            <div id="reportsChart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                new ApexCharts(document.querySelector("#reportsChart"), {
                  series: [{
                    name: 'Saldo',
                    data: @json($data -> pluck('saldo'))
                  }],
                  chart: {
                    height: 350,
                    type: 'area',
                    toolbar: {
                      show: false
                    },
                  },
                  markers: {
                    size: 4
                  },
                  colors: ['#4154f1', '#ff0000', '#00ff00'],
                  fill: {
                    type: "gradient",
                    gradient: {
                      shadeIntensity: 1,
                      opacityFrom: 0.3,
                      opacityTo: 0.4,
                      stops: [0, 90, 100]
                    }
                  },
                  dataLabels: {
                    enabled: false
                  },
                  stroke: {
                    curve: 'smooth',
                    width: 2
                  },
                  xaxis: {
                    type: 'datetime',
                    categories: @json($data -> pluck('tanggal'))
                  },
                  tooltip: {
                    x: {
                      format: 'dd/MM/yy'
                    },
                  }
                }).render();
              });
            </script>
            <!-- End Line Chart -->

          </div>

        </div>
      </div><!-- End Reports -->

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Column Chart</h5>

          <!-- Line Chart -->
          <div id="lineChart"></div>

          <script>
            document.addEventListener("DOMContentLoaded", () => {
              // Ambil data stok dari Laravel blade template
              const stocks = @json($stocks);

              // Siapkan data untuk chart
              const categories = stocks.map(stock => stock.tanggal);
              const pasirCilegonData = stocks.map(stock => stock.pasir_cilegon);
              const pasirTayanData = stocks.map(stock => stock.pasir_tayan);
              const split1020Data = stocks.map(stock => stock.split_10_20);
              const splitScreeningData = stocks.map(stock => stock.split_screening);
              const flyAshData = stocks.map(stock => stock.fly_ash);
              const semenHcData = stocks.map(stock => stock.semen_hc);
              const semenOpcData = stocks.map(stock => stock.semen_opc);
              const abuBatuData = stocks.map(stock => stock.abu_batu);
              const additiveSobuteData = stocks.map(stock => stock.additive_sobute);
              const additiveDevChemData = stocks.map(stock => stock.additive_dev_chem);
              const solarData = stocks.map(stock => stock.solar);

              new ApexCharts(document.querySelector("#lineChart"), {
                series: [{
                  name: 'Pasir Cilegon',
                  data: pasirCilegonData
                }, {
                  name: 'Pasir Tayan',
                  data: pasirTayanData
                }, {
                  name: 'Split 10-20',
                  data: split1020Data
                }, {
                  name: 'Split Screening',
                  data: splitScreeningData
                }, {
                  name: 'Fly Ash',
                  data: flyAshData
                }, {
                  name: 'Semen HC',
                  data: semenHcData
                }, {
                  name: 'Semen OPC',
                  data: semenOpcData
                }, {
                  name: 'Abu Batu',
                  data: abuBatuData
                }, {
                  name: 'Additive Sobute',
                  data: additiveSobuteData
                }, {
                  name: 'Additive Dev Chem',
                  data: additiveDevChemData
                }, {
                  name: 'Solar',
                  data: solarData
                }],
                chart: {
                  type: 'line',
                  height: 350,
                  toolbar: {
                    show: false
                  },
                },
                markers: {
                  size: 4
                },
                colors: ['#4154f1', '#ff0000', '#00ff00', '#ff00ff', '#00ffff', '#ff8000', '#8000ff', '#ff0080', '#80ff00', '#0080ff', '#808080'],
                fill: {
                  type: "solid",
                },
                dataLabels: {
                  enabled: false
                },
                stroke: {
                  curve: 'smooth',
                  width: 2
                },
                xaxis: {
                  type: 'datetime',
                  categories: categories
                },
                yaxis: {
                  title: {
                    text: 'Jumlah Stok'
                  }
                },
                tooltip: {
                  x: {
                    format: 'dd/MM/yy'
                  },
                  y: {
                    formatter: function(val) {
                      return val + " unit"
                    }
                  }
                }
              }).render();
            });
          </script>
          <!-- End Line Chart -->


        </div>
      </div>
    </section>


  </main><!-- End #main -->

  @endif

  @include('layout.footer');

</body>

</html>