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
        <link rel="stylesheet"type="text/css" href="{{URL::asset('css/createvoucher.css')}}">
        <link rel="stylesheet"type="text/css" href="{{URL::asset('css/app.css')}}">
      </header>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Fichas creadas</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
            <div class="col-md-7"></div>
              <div class="col-sm-12 col-md-5 " style="align-items: center">
                <div>
                  <a class="btn btn-warning btn-md" href="{{route('/dashboard/vouchers/template',$voucherget->id )}}">
                    <i class="far fa-object-ungroup"></i> Crear plantilla
                  </a>
                  
                  <a class="btn btn-info btn-md" href="{{route('/dashboard/vouchers/design',$voucherget->id )}}">
                    <i class="fas fa-print"></i> Imprimir
                  </a>
                  
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
                  aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                    <tr role="row">
                      <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-label="Position: activate to sort column ascending" style="width: 160px;">Servidor</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-label="Office: activate to sort column ascending" style="width: 116px;">Usuario</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-label="Age: activate to sort column ascending" style="width: 116px;">Contraseña</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-label="Start date: activate to sort column ascending" style="width: 116px;">Perfil</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-label="Salary: activate to sort column ascending" style="width: 200px;">Límite tiempo - días</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-label="Salary: activate to sort column ascending" style="width: 100px;">Fecha</th>  
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($detailsv as $detail)
                    <tr role="row" class="odd">
                      <td class=>{{$detail->server_detailv}}</td>
                      <td>{{$detail->user_detailv}}</td>
                      <td>{{$detail->password_detailv}}</td>
                      <td>{{$voucherget->nprofile_voucher}}</td>
                      <td>Días: {{$detail->limittda_detailv}}  //  Horas: {{$detail->limitho_detailv}}</td>
                      <td>{{$detail->created_at}}</td>
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

  @endsection