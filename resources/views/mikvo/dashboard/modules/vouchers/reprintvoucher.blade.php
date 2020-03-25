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
      <header>
        <link rel="stylesheet"type="text/css" href="{{URL::asset('css/reprintvoucher.css')}}">
        <link rel="stylesheet"type="text/css" href="{{URL::asset('css/app.css')}}">
      </header>
    @endsection
    
    @section('content')
        
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Reimprimir vouchers</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive table-hover">
      <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
        <div class="col-sm-12 col-md-4">
                <form action="/dashboard/search-voucher" method="GET">
                  <div class="input-group">
                    <input type="search" class="form-control form-control-md" name ="search">
                      <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                      </span>
                  </div>
              </form>
                </div>
                </div>
        <div class="row">
          <div class="col-sm-12">
            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
              aria-describedby="dataTable_info" style="width: 100%;">
              <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 161px;">
                    DNS</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Position: activate to sort column ascending" style="width: 115px;">Número de usuarios</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Office: activate to sort column ascending" style="width: 115px;">Servidor</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Age: activate to sort column ascending" style="width: 115px;">Prefijo</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Start date: activate to sort column ascending" style="width: 115px;">Perfil</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Salary: activate to sort column ascending" style="width: 115px;">Fecha</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Actions: activate to sort column ascending" style="width: 180px;">Acciones</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($vouchers as $voucher)
                <tr role="row" class="even">
                  <td class="sorting_1">{{$voucher->dnsname_voucher}}</td>
                  <td>{{$voucher->nusers_voucher}}</td>
                  <td>{{$voucher->server_voucher}}</td>
                  <td>{{$voucher->prefix_voucher}}</td>
                  <td>{{$voucher->nprofile_voucher}}</td>
                  <td>{{$voucher->created_at}}</td>
                  <td id="btntable">
                        <form action="{{route('/dashboard/vouchers/delete',$voucher->id)}}" method="POST" role="form" onsubmit="return confirmdelete()">
                          <input type="hidden" name="_method" value="PUT">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <a href="{{ route('/dashboard/vouchers/reprintvoucher',$voucher->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-print"></i> Imprimir
                          </a>
                          <button class="btn btn-danger btn-sm" name="deletevoucher" type="submit">
                          <i class="fa fa-trash-o"></i> Eliminar
                          </button>
                        </form>
                      </td>
                </tr>
                <div id="confirm" class="modal hide fade">
                  <div class="modal-body">
                    Are you sure?
                  </div>
                  <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
                    <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                  </div>
                </div>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          
          <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
              <ul class="pagination">
                {{$vouchers->links()}}
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('sweetalert::alert')
<script type="text/javascript">
    
  function confirmdelete()
  {
  var x = confirm("¿Estas seguro de eliminar el router?");
  if (x)
    return true;
  else
    return false;
  }

</script>
  @endsection