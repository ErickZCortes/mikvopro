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
    <h1 class="h3 mb-2 text-gray-800">Routerboar</h1>
    <div class="card shadow mb-4">
      <div class="card-body">
        <h5 id="title">Add Routers</h5>
        <form method="POST" action="{{ route('/dashboard/routerboard') }}">
           @csrf
          <div class="row">
            <div class="col-sm-10 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="model_router">Model:</label>
                <input 
                  id="model_router"
                  type="text" 
                  class="form-control" 
                  name="model_router"
                  required
                  placeholder="Ingresa el modelo" 
                  >
              </div>
            </div>
            <div class="col-sm-10 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="router_description">Description:</label>
                <input 
                  id="router_description"
                  type="text" 
                  class="form-control" 
                  name="router_description"
                  required
                  placeholder="Ingresa la descripción"
                  >
              </div>
            </div>
            <div class="col-sm-10 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="ip_router">IP:</label>
                <input 
                  id="ip_router"
                  type="text" 
                  class="form-control" 
                  name="ip_router"
                  required
                  placeholder="Ingresa la IP"
                  >
              </div>
            </div>
            <div class="col-sm-10 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="user_router">User:</label>
                <input 
                  id="user_router"
                  type="text" 
                  class="form-control" 
                  name="user_router"
                  required
                  placeholder="Ingresa el usuario"
                  >
              </div>
            </div>
            <div class="col-sm-10 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="password_router">Password:</label>
                <input 
                  id="password_router"
                  type="text" 
                  class="form-control" 
                  name="password_router"
                  required
                  placeholder="Ingresa la contraseña"
                  >
              </div>
            </div>
            <div id="btnform" class="col-sm-10 col-md-4 col-lg-4">
              <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
          </div>
        </form>
      </div>
    
    </div>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive table-hover">
          <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length"
                      aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                    </select> entries</label></div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search"
                      class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
                  aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 161px;">Modelo</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-label="Position: activate to sort column ascending" style="width: 246px;">Descripción</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-label="Office: activate to sort column ascending" style="width: 116px;">IP Router</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-label="Age: activate to sort column ascending" style="width: 51px;">Usuario</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-label="Start date: activate to sort column ascending" style="width: 107px;">Contraseña</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-label="Actions: activate to sort column ascending" style="width: 51px;">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr role="row" class="odd">
                      <td class="sorting_1">hi</td>
                    
                      <td id="btntable">
                        <button class="btn btn-danger btn-sm" (click)="deletRouter(router.id_router)">
                          <i class="fa fa-trash-o"></i>
                        </button>
                      </td>
                    </tr>
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
                    <li class="paginate_button page-item previous disabled" id="dataTable_previous">
                      <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">
                        Previous
                      </a>
                    </li>
                    <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1"
                        tabindex="0" class="page-link">1</a></li>
                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2"
                        tabindex="0" class="page-link">2</a></li>
                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3"
                        tabindex="0" class="page-link">3</a></li>
                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4"
                        tabindex="0" class="page-link">4</a></li>
                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5"
                        tabindex="0" class="page-link">5</a></li>
                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6"
                        tabindex="0" class="page-link">6</a></li>
                    <li class="paginate_button page-item next" id="dataTable_next">
                      <a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @endsection


