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
      
<h1 class="h3 mb-2 text-gray-800">Perfiles</h1>
<div class="card shadow mb-4">
      
    <div class="card-body">
      <div class="table-responsive table-hover">
        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <form action="/dashboard/search-profile" method="GET">
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <div class="input-group">
                <input type="search" class="form-control form-control-md" name ="search">
                  <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                  </span>
              </div>
            </div>
            <div class="col-sm-12 col-md-4" style="margin-left: 20px">
            <div class="input-group">
            <a href="{{ route('/dashboard/profiles/create') }}" class="btn btn-success"> <i class="fas fa-plus"></i> Agregar Perfil</a>
            </div>
            </div>
          </div>
          </form>
          <div class="row">
            <div class="col-sm-12">
              <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
                aria-describedby="dataTable_info" style="width: 100%;">
                <thead>
                  <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                      aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 160px;">Nombre</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                      aria-label="Position: activate to sort column ascending" style="width: 130px;">Address Pool</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                      aria-label="Office: activate to sort column ascending" style="width: 130px;">Límite de velocidad</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                      aria-label="Age: activate to sort column ascending" style="width: 100px;">Precio</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                      aria-label="Actions: activate to sort column ascending" style="width: 130px;">Tipo tiempo</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                      aria-label="Actions: activate to sort column ascending" style="width: 100px;">Límite de tiempo</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                      aria-label="Actions: activate to sort column ascending" style="width: 50px;">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($profiles as $profile)
                  <tr role="row" class="odd">
                    <td class="sorting_1">{{$profile->name_profile}}</td>
                    <td class="sorting_1">{{$profile->addpool_profile}}</td>
                    <td class="sorting_1">{{$profile->vsubida_profile}}{{$profile->sbyte_profile}}/{{$profile->vdescarga_profile}}{{$profile->dbyte_profile}}</td>
                    <td class="sorting_1">${{$profile->cost_profile}}.00</td>
                    <td class="sorting_1">{{$profile->typet_profile}}</td>
                    <td class="sorting_1">Días: {{$profile->limitda_profiles}} / Horas: {{$profile->limitho_profiles}}</td>                
                    <td id="btntable">
                      <form action="{{route('/dashboard/profiles/delete',$profile->id)}}" method="POST" role="form" onsubmit="return confirmdelete()">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('/dashboard/profiles/edit',$profile->id) }}" class="btn btn-primary btn-sm"> <i class="far fa-edit"></i> Editar</a>
                        <button class="btn btn-danger btn-sm" type="submit">
                          <i class="fa fa-trash-o"></i> Eliminar
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
            
            <div class="col-sm-12 col-md-7">
              <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                <ul class="pagination">
                {{$profiles->links()}}
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
