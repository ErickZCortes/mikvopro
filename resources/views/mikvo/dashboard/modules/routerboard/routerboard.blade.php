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
      <link rel="stylesheet"type="text/css" href="{{URL::asset('css/routerboard.css')}}">
      <link rel="stylesheet"type="text/css" href="{{URL::asset('css/app.css')}}">
    </header>
    @endsection
    
    @section('content')
    <h1 class="h3 mb-2 text-gray-800">Routerboard</h1>
    @if(Session::has('message'))
                    <div class="alert alert-primary" role="alert">
                      {{ Session::get('message') }}
                    </div>
                  @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive table-hover">
          <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
              <div class="col-sm-12 col-md-4">
                <div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length"
                      aria-controls="dataTable" class="custom-select custom-select-md form-control form-control-md">
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                    </select> entries</label></div>
              </div>
              <div class="col-sm-12 col-md-4">
                <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search"
                      class="form-control form-control-md" placeholder="" aria-controls="dataTable"></label></div>
              </div>
              <div class="col-sm-12 col-md-4">
                <a href="{{ route('/dashboard/routerboard/create') }}" class="btn btn-success mt-4 ml-3">Agregar Router</a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
                  aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 116px;">Nombre</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-label="Position: activate to sort column ascending" style="width: 116px;">Modelo</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-label="Position: activate to sort column ascending" style="width: 116px;">Número de serie</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-label="Office: activate to sort column ascending" style="width: 116px;">Dirección IP</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-label="Age: activate to sort column ascending" style="width: 116px;">Usuario</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-label="Age: activate to sort column ascending" style="width: 116px;">Puerto</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-label="Actions: activate to sort column ascending" style="width: 116px;">Acciones</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($routers as $router)
                    <tr role="row" class="odd">
                      <td class="sorting_1">{{$router->name_router}}</td>
                      <td class="sorting_1">{{$router->model_router}}</td>
                      <td class="sorting_1">{{$router->serialn_router}}</td>
                      <td class="sorting_1">{{$router->ip_router}}</td>
                      <td class="sorting_1">{{$router->user_router}}</td>
                      <td class="sorting_1">{{$router->port_router}}</td>
                      <td id="btntable">
                        <form action="{{route('/dashboard/routerboard/delete',$router->id)}}" method="POST" role="form" onsubmit="return confirmdelete()">
                          <input type="hidden" name="_method" value="PUT">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <a href="{{ route('/dashboard/routerboard/edit',$router->id) }}" class="btn btn-info btn-sm">Editar</a>
                          <button class="btn btn-danger btn-sm" type="submit">
                          <i class="fa fa-trash-o"></i>
                          </button>
                          <a  href="{{ route('/dashboard/routerboard/conect', $router->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plug"></i> Conectar
                          </a>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                  Showing 1 to 10 of 57 entries
                </div>
              </div>
              <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                  <ul class="pagination">
                    {{$routers->links()}}
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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