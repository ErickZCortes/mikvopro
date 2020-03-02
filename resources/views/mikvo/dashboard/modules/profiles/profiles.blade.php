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
            <link rel="stylesheet"type="text/css" href="{{URL::asset('css/profiles.css')}}">
            <link rel="stylesheet"type="text/css" href="{{URL::asset('css/app.css')}}">
        </header>
    @endsection
    
    @section('content')
      
<h1 class="h3 mb-2 text-gray-800">Profiles</h1>
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
              <a href="{{ route('/dashboard/profiles/create') }}" class="btn btn-success mt-4 ml-3">Agregar Perfil</a>

            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
                aria-describedby="dataTable_info" style="width: 100%;">
                <thead>
                  <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                      aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 161px;">Nombre</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                      aria-label="Position: activate to sort column ascending" style="width: 246px;">Pool</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                      aria-label="Office: activate to sort column ascending" style="width: 116px;">Velocidad subida</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                      aria-label="Age: activate to sort column ascending" style="width: 51px;">Velocidad descarga</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                      aria-label="Actions: activate to sort column ascending" style="width: 51px;">Costo</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                      aria-label="Actions: activate to sort column ascending" style="width: 51px;">Tipo tiempo</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($profiles as $profile)
                  <tr role="row" class="odd">
                    <td class="sorting_1">{{$profile->name_profile}}</td>
                    <td class="sorting_1">{{$profile->addpool_profile}}</td>
                    <td class="sorting_1">{{$profile->vsubida_profile}}</td>
                    <td class="sorting_1">{{$profile->vdescarga_profile}}</td>
                    <td class="sorting_1">{{$profile->cost_profile}}</td>
                    <td class="sorting_1">{{$profile->typet_profile}}</td>                
                    <td id="btntable">
                      <form action="{{route('/dashboard/profiles/delete',$profile->id)}}" method="POST" role="form" onsubmit="return confirmdelete()">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('/dashboard/profiles/edit',$profile->id) }}" class="btn btn-info btn-sm">Editar</a>
                        <button class="btn btn-danger btn-xs" type="submit">
                          <i class="fa fa-trash-o"> Eliminar</i>
                        </button>
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
  <script type="text/javascript">
  
    function confirmdelete()
    {
    var x = confirm("¿Estas seguro de eliminar el perfil?");
    if (x)
      return true;
    else
      return false;
    }
  
  </script>

  @endsection