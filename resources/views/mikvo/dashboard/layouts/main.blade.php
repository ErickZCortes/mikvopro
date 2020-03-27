@extends('mikvo.dashboard.layouts.default')
    @section('header')
        @include('mikvo.dashboard.shared.components.header')
        
    @endsection
    
    @section('sidebar')
        @include('mikvo.dashboard.shared.components.sidebar')
    @endsection
    
    @section('footer')
        @include('mikvo.dashboard.shared.components.footer')
    @endsection
    
    @section('css')

    @endsection
    
    @section('content')
    <header>
  <link rel="stylesheet"type="text/css" href="{{URL::asset('css/main.css')}}">
  <link rel="stylesheet"type="text/css" href="{{URL::asset('css/app.css')}}">
</header>
  <!-- Page Heading -->
  <!-- Content Row -->
  <div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-info shadow" id="cards">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h5 text-xs text-primary text-capitalize mb-1">Router : {{$router->name_router}}</div>
              <strong class="h7 text-gray-800">IP : {{$router->ip_router}} /</strong>
              <strong class="text-gray-800"> USER : {{$router->user_router}}</strong>
            </div>
            <div class="col-auto">
              <i class="fas fa-server fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow" id="cards">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h5 text-xs text-primary text-capitalize mb-1">Usuarios activos</div>
              <?php 
                echo "<div class='h4 mb-0 text-gray-800'>".count($active)."</div>";
              ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-check fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow" id="cards">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h5 text-xs text-primary text-capitalize mb-1">Total usuarios</div>
              <?php 
                echo "<div class='h4 mb-0 text-gray-800'>".count($usersall)."</div>";;
              ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card border-left-info shadow" id="cards">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h5 text-xs text-primary text-capitalize mb-1">Costos</div>
              <div class="h4 mb-0 text-gray-800">${{$costos}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  <div class="row">
    <div class="col-md-6 ">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Rendimiento de cpu</h6>
        </div>
        <div class="card-body">
          <div class="chart-pie">
            <canvas id="donutcpu"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Rendimiento de cpu</h6>
        </div>
        <div class="card-body">
          <div class="chart-pie">
            <canvas id="traffic"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
    <div class="card shadow mb-4">
      
      <div class="card-body">
        <div class="table-responsive table-hover">
          <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
              <div class="col-sm-12 col-md-4">
              <form action="/delete-scripts" method="POST" role="form" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
              </div>
              </form>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
                  aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 90%;">
                        Fecha de creación | Hora de conexión | Usuario | Precio ficha | Dirección IP | Dirección MAC | Tiempo | Perfil
                        </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($scripts as $script)
                    <tr role="row" class="odd">
                      <td class="sorting_1">{{$script['name']}}</td>                
                     
                    </tr>
                    @endforeach
                  </tbody>
                </table>
  
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    </div>
    
    
<script>

var ctx = document.getElementById('donutcpu');
        var donutcpu = new Chart(ctx, {
            // The type of chart we want to create
            type: 'doughnut',

            // The data for our dataset
            data: {
            labels: [
					'Memoria disponible en MiB',
					'Memoria utilizada en MiB'
					],
            datasets: [{
                
                backgroundColor:[
                                'rgb(255, 206, 86, 0.2)',
                                'rgb(75, 192, 192, 0.2)'],
                borderColor:[
                            'rgb(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'],
                data: [{{$freememory}}, {{$restmemeory}}]
            }]
        },
        });
</script>
<script>

var ctx = document.getElementById('donutcpu');
        var donutcpu = new Chart(ctx, {
            // The type of chart we want to create
            type: 'doughnut',

            // The data for our dataset
            data: {
            labels: [
					'Memoria disponible en MiB',
					'Memoria utilizada en MiB'
					],
            datasets: [{
                
                backgroundColor:[
                                'rgb(255, 206, 86, 0.2)',
                                'rgb(75, 192, 192, 0.2)'],
                borderColor:[
                            'rgb(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'],
                data: [{{$freememory}}, {{$restmemeory}}]
            }]
        },
        });


   var ctx = document.getElementById("traffic");
  var traffic = new Chart(ctx, {
    type: 'line',
    data: {
      
      datasets: [{
        label: 'Tx',
        backgroundColor:[
                               
                                'rgb(255, 99, 132, 0)'],
                borderColor:[
                           
                            'rgba(255, 99, 132, 1)'],
                            borderWidth: 1
        }, {label: 'Rx',
          backgroundColor:[
                                'rgb(54, 162, 235, 0)'],
                                
                borderColor:[
                            'rgb(54, 162, 235, 1)'],
                            
        
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        xAxes: [{
        }
          
        ],
        yAxes: [{
          ticks: {
            beginAtZero:true
          },
          labels: {
                              formatter: function () {      
                                var bytes = this.value;                          
                                var sizes = ['bps', 'kbps', 'Mbps', 'Gbps', 'Tbps'];
                                if (bytes == 0) return '0 bps';
                                var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                                return parseFloat((bytes / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i];                    
                              },
                            },
        }]
      }
    }
  });
  var updateChart = function() {
    $.ajax({
      url: "{{ route('api.chart') }}",
      type: 'GET',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        traffic.data.labels = [data.labels[0], data.labels[1]];
        traffic.data.datasets[0].data = data.data[0];
        traffic.data.datasets[1].data = data.data[1];
        traffic.options.scales.yAxes.labels = {
          formatter: function () {      
                                var bytes = this.value;                          
                                var sizes = ['bps', 'kbps', 'Mbps', 'Gbps', 'Tbps'];
                                if (bytes == 0) return '0 bps';
                                var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                                return parseFloat((bytes / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i];                    
                              },
        }

        traffic.update();
      },
      error: function(data){
        console.log(data);
      }
    });
  }
  
  updateChart();
  setInterval(() => {
    updateChart();
  }, 1000);
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-streaming@latest/dist/chartjs-plugin-streaming.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    @endsection