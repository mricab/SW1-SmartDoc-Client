@extends('layouts.app')

@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Estadísticas</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">CPU Traffic</span>
              <span class="info-box-number">
                10
                <small>%</small>
              </span>
            </div>
          </div>    
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
            </div> 
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span class="info-box-number">760</span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New Members</span>
              <span class="info-box-number">2,000</span>
            </div>
          </div>
        </div>
      </div>

        <div class="row">
            <div class="col col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3 bg-warning">
                  <span class="info-box-icon"><i class="fas fa-tag"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Inventory</span>
                    <span class="info-box-number">5,200</span>
                  </div>
                </div>
            </div>
            <div class="col col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3 bg-success">
                    <span class="info-box-icon"><i class="far fa-heart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Mentions</span>
                      <span class="info-box-number">92,050</span>
                    </div>
                  </div>
            </div>
            <div class="col col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3 bg-danger">
                    <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Downloads</span>
                      <span class="info-box-number">114,381</span>
                    </div>
                  </div>
            </div>
            <div class="col col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3 bg-info">
                    <span class="info-box-icon"><i class="far fa-comment"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Direct Messages</span>
                      <span class="info-box-number">163,921</span>
                    </div>
                  </div>
            </div>
        </div>      
    </div>
    
    <div class="container p-4 my-4 border col-12 bg-white">
      <div class="row">
        <div class="col-md-6">
          <div class="card h-100">
            <div class="card-body">
              <canvas id="Donut"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card h-100">
            <div class="card-body">
              <canvas id="Polar"></canvas>
            </div>
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card h-100">
              <div class="card-body">
                <canvas id="VertBar"></canvas> 
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card h-100">
              <div class="card-body">
                <canvas id="Radar"></canvas> 
              </div>
            </div>
          </div>
        </div>
    </div>
    
@endsection

@section('scripts')
  <script>
    new Chart(document.getElementById("Donut"), {
              type: 'doughnut',
              data: {
                labels: ["Hombres", "Mujeres"],
                datasets: [{
                  backgroundColor: ["#2b5797", "#b91d47"],
                  data: [8.157,7.160]
                }]
              },
              options: {
                title: {
                  display: true,
                  text: 'Datos estadísticos'
                }
              }
          });

    new Chart(document.getElementById("Polar"), {
              type: 'polarArea',
              data: {
                labels: [
                  'Red',
                  'Green',
                  'Yellow',
                  'Grey',
                  'Blue'
                ],
                datasets: [{
                  label: 'My First Dataset',
                  data: [11, 16, 7, 3, 14],
                  backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(75, 192, 192)',
                    'rgb(255, 205, 86)',
                    'rgb(201, 203, 207)',
                    'rgb(54, 162, 235)'
                  ]
                }]
              },
              options: {}
          });
          

    new Chart(document.getElementById("VertBar"), {
              type: 'bar',
              data: {
                labels: ["Hombres", "Mujeres"],
                datasets: [{
                  backgroundColor: ["#2b5797", "#b91d47"],
                  data: [8.157,7.160]
                }]
              },
              options: {
                title: {
                  display: true,
                  text: 'Datos estadísticos'
                }
              }
          });


    new Chart(document.getElementById("Radar"), {
              type: 'radar',
              data: {
                labels: ['Eating','Drinking','Sleeping','Designing','Coding','Cycling','Running'],
                datasets: [{
                  label: 'My First Dataset',
                  data: [65, 59, 90, 81, 56, 55, 40],
                  fill: true,
                  backgroundColor: 'rgba(255, 99, 132, 0.2)',
                  borderColor: 'rgb(255, 99, 132)',
                  pointBackgroundColor: 'rgb(255, 99, 132)',
                  pointBorderColor: '#fff',
                  pointHoverBackgroundColor: '#fff',
                  pointHoverBorderColor: 'rgb(255, 99, 132)'
                }, {
                  label: 'My Second Dataset',
                  data: [28, 48, 40, 19, 96, 27, 100],
                  fill: true,
                  backgroundColor: 'rgba(54, 162, 235, 0.2)',
                  borderColor: 'rgb(54, 162, 235)',
                  pointBackgroundColor: 'rgb(54, 162, 235)',
                  pointBorderColor: '#fff',
                  pointHoverBackgroundColor: '#fff',
                  pointHoverBorderColor: 'rgb(54, 162, 235)'
                }]
              },
              options: {
                elements: {
                  line: {
                    borderWidth: 3
                  }
                }
              }
          });
  </script>
@endsection