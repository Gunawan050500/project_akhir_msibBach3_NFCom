@extends('admin.index')
@section('content')
<section class="section">
      <div class="row">

        {{--  <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Line Chart</h5>

              <!-- Line Chart -->
              <canvas id="barChart" style="max-height: 400px;"></canvas>
              <script>
              var lbl4 = [@foreach($ar_jumlahdonasi as $jmldon) '{{$jmldon->jml_donasi}}', @endforeach];
              var jml4 = [@foreach($ar_jumlahdonasi as $jmldon) {{$jmldon->jumlah}}, @endforeach];
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#lineChart'), {
                    type: 'line',
                    data: {
                      labels: lbl4,
                      datasets: [{
                        label: 'Line Chart',
                        data: jml4,
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
              <!-- End Line CHart -->

            </div>
          </div>
        </div>  --}}

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Rekapitulasi Gender Anak Asuh</h5>

              <!-- Pie Chart -->
              <canvas id="pieChart" style="max-height: 400px;"></canvas>
              <script>
              var lbl2 = [@foreach($ar_gender as $gender) '{{$gender->gender}}', @endforeach];
              var jml2 = [@foreach($ar_gender as $gender) {{$gender->jumlah}}, @endforeach];
              
              //{{--  {$harta->kekayaan}} tidak usah petik karena tipenya integer datnya  --}}
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#pieChart'), {
                    type: 'pie',
                    data: {
                      labels:lbl2,
                      datasets: [{

                        label: 'My First datasets',
                        data:jml2,
                        backgroundColor: [
                          'rgb(255, 99, 132)',
                          'rgb(54, 162, 235)',
                          'rgb(255, 205, 86)'
                        ],
                        hoverOffset: 4
                      }]
                    }
                  });
                });
              </script>
              <!-- End Pie CHart -->

            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Rekapitulasi Pendidikan Anak Asuh</h5>

              <!-- Doughnut Chart -->
              <canvas id="doughnutChart" style="max-height: 400px;"></canvas>
              <script>

              var label3 = [@foreach($ar_pendidikan as $didik) '{{$didik->pendidikan}}', @endforeach];
              var jml3 = [@foreach($ar_pendidikan as $didik) {{$didik->jumlah}}, @endforeach];
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#doughnutChart'), {
                    type: 'doughnut',
                    data: {
                      labels: label3,
                      datasets: [{
                        label: 'My First Dataset',
                        data: jml3,
                        backgroundColor: [
                          'rgb(255, 99, 132)',
                          'rgb(54, 162, 235)',
                          'rgb(255, 205, 86)',
                          'rgb(4, 86, 250 )',
                          'rgb(250, 56, 4 )',
                        ],
                        hoverOffset: 4
                      }]
                    }
                  });
                });
              </script>
              <!-- End Doughnut CHart -->

            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Rekapitulasi Donasi</h5>

              <!-- Bar Chart -->
              <canvas id="barChart" style="max-height: 400px;"></canvas>
              <script>
              //ambil data nama dan kekayaan pegawai dari fungsi indeks
              var lbl = [@foreach($ar_donasi as $dana) '{{$dana->tgl_donasi}}', @endforeach];
              var dana = [@foreach($ar_donasi as $dana) {{$dana->jml_donasi}}, @endforeach];
              //{{--  {$harta->kekayaan}} tidak usah petik karena tipenya integer datnya  --}}
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#barChart'), {
                    type: 'bar',
                    data: {
                      //label: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                        labels: lbl,
                        datasets:[{

                        //label: 'Harta Kekayaan Pegawai',
                        //data: [65, 59, 80, 81, 56, 55, 40],
                        data:dana,
                        backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(255, 159, 64, 0.2)',
                          'rgba(255, 205, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                          'rgb(255, 99, 132)',
                          'rgb(255, 159, 64)',
                          'rgb(255, 205, 86)',
                          'rgb(75, 192, 192)',
                          'rgb(54, 162, 235)',
                          'rgb(153, 102, 255)',
                          'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
              <!-- End Bar CHart -->

            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Rekapitulasi Donasi</h5>

              <!-- Bar Chart -->
              <canvas id="barChart" style="max-height: 400px;"></canvas>
              <script>
              //ambil data nama dan kekayaan pegawai dari fungsi indeks
              var lbl = [@foreach($ar_donasi as $dana) '{{$dana->tgl_donasi}}', @endforeach];
              var dana = [@foreach($ar_donasi as $dana) {{$dana->jml_donasi}}, @endforeach];
              //{{--  {$harta->kekayaan}} tidak usah petik karena tipenya integer datnya  --}}
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#barChart'), {
                    type: 'bar',
                    data: {
                      //label: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                        labels: lbl,
                        datasets:[{

                        label: '',
                        //data: [65, 59, 80, 81, 56, 55, 40],
                        data:dana,
                        backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(255, 159, 64, 0.2)',
                          'rgba(255, 205, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                          'rgb(255, 99, 132)',
                          'rgb(255, 159, 64)',
                          'rgb(255, 205, 86)',
                          'rgb(75, 192, 192)',
                          'rgb(54, 162, 235)',
                          'rgb(153, 102, 255)',
                          'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
              <!-- End Bar CHart -->

            </div>
          </div>
        </div>


      </div>
    </section>
@endsection