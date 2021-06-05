<x-app-layout>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">RoyalUI Dashboard</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Mahasiswa Aktif</p>
                        <div
                             class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h4 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $studentActive }}</h4>
                            <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Mahasiswa Cuti</p>
                        <div
                             class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h4 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $studentLeave }}</h4>
                            <i class="ti-na icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Terbayar <small>(semester ini)</small></p>
                        <div
                             class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h4 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                                {{ "Rp" . number_format($totalPaid,0,',','.') }}</h4>
                            <i class="ti-money icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Kekurangan <small>(semester ini)</small></p>
                        <div
                             class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h4 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                                {{ "Rp" . number_format($totalLack,0,',','.') }}</h4>
                            <i class="ti-alert icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Detail Pembayaran Semester Ini</p>
                        <div id="sales-legend"
                             class="chartjs-legend mt-4 mb-2"></div>
                        <canvas id="sales-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a
                   href="https://www.templatewatch.com/"
                   target="_blank">Templatewatch</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                   class="ti-heart text-danger ml-1"></i></span>
        </div>
    </footer>
    <!-- partial -->

    <x-slot name="js2">
        <script>
            if ($("#sales-chart").length) {
          var SalesChartCanvas = $("#sales-chart").get(0).getContext("2d");
          var SalesChart = new Chart(SalesChartCanvas, {
            type: 'bar',
            data: {
              labels: ["Maret", "April", "Mei", "Juni", "Juli", "Agustus"],
              datasets: [{
                  label: 'Pembayaran',
                  data: {!! $paidPerMonth !!},
                  backgroundColor: '#316FFF'
                },
              ]
            },
            options: {
              responsive: true,
              maintainAspectRatio: true,
              layout: {
                padding: {
                  left: 0,
                  right: 0,
                  top: 20,
                  bottom: 0
                }
              },
              scales: {
                yAxes: [{
                  display: true,
                  gridLines: {
                    display: false,
                    drawBorder: false
                  },
                  ticks: {
                    display: false,
                    min: 0,
                  }
                }],
                xAxes: [{
                  stacked: false,
                  ticks: {
                    beginAtZero: true,
                    fontColor: "#9fa0a2"
                  },
                  gridLines: {
                    color: "rgba(0, 0, 0, 0)",
                    display: false
                  },
                  barPercentage: 1
                }]
              },
              legend: {
                display: false
              },
              elements: {
                point: {
                  radius: 0
                }
              }
            },
          });
          document.getElementById('sales-legend').innerHTML = SalesChart.generateLegend();
        }
        </script>
    </x-slot>
</x-app-layout>