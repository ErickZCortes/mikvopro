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
<body>
    <h1 class="h3 mb-2 text-gray-800">Vouchers</h1>
    <div class="card shadow mb-4">
      <div class="card-body">
        <h5 id="title">Crear nuevos vouchers</h5>
        <form method="POST" action="{{ route('/dashboard/vouchers/store') }}">
        @csrf  
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">  
        <div class="row">
            <div class="col-sm-10 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="dnsname_voucher">Nombre DNS:</label>
                <select class="form-control" id="dnsname_voucher" name="dnsname_voucher" >
                  <option selected> Elige una opción</option>
                  @foreach ($alldns as $dns)
                  @if ($dns['dns-name'] != "")
                  <option>{{$dns['dns-name']}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-10 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="nusers_voucher">Número de usuarios:</label>
                <input 
                  type="number" 
                  class="form-control" 
                  id="nusers_voucher"
                  required 
                  min="1"
                  placeholder="Número de usuarios" 
                  name="nusers_voucher"
                  >
              </div>
            </div>
            <div class="col-sm-10 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="server_voucher">Servidor:</label>
                <select class="form-control" id="server_voucher" name="server_voucher" >
                  <option value="all" selected>all</option>
                  @foreach ($allservers as $server)
                  <option>{{$server['name']}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-10 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="prefix_voucher">Prefijo:</label>
                <input 
                  type="text" 
                  class="form-control" 
                  id="prefix_voucher" 
                  maxlength="15"
                  placeholder="Ingresa el prefijo" 
                  name="prefix_voucher"
                >
              </div>
            </div>
            <div class="col-sm-10 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="nprofile_voucher">Perfiles:</label>
                <select class="form-control" id="nprofile_voucher" name="nprofile_voucher" >
                  <option selected> Elige una opción</option>
                  @foreach ($profiles as $profile)
                  <option>{{$profile['name']}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-10 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="tipo_generar">Tipo de generación:</label>
                <select class="form-control" id="tipo_generar" name="tipo_generar" >
                  <option selected> Elige una opción</option>
                  <option value="lowercase">Sólo letras minúsculas</option>
                  <option value="uppercase">Sólo letras mayúsculas</option>
                  <option value="numbers">Sólo números</option>
                  <option value="letnumlow">Números y letras minúsculas</option>
                  <option value="letnumupp">Números y letras mayúsculas</option>
                  <option value="all">Todo</option>
                </select>
              </div>
            </div>
            <div class="col-sm-10 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="long_user">Longitud de usuario:</label>
                <input 
                  type="number" 
                  class="form-control" 
                  id="long_user" 
                  name="long_user"
                  required
                  min="1"
                  placeholder="Longitud de usuario"
                >
              </div>
            </div>
            <div class="col-sm-10 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="long_pass">Longitud de contraseña:</label>
                <input 
                  type="number" 
                  class="form-control" 
                  id="long_pass" 
                  name="long_pass"
                  min="1"
                  required
                  placeholder="Longitud de contraseña"
                >
              </div>
            </div>
            <div id="btnform" class="col-sm-10 col-md-4 col-lg-4">
              <button type="submit" class="btn btn-md btn-success"><i class="fas fa-file"></i> Generar</button>
              <a href="{{ route('/dashboard') }}"  class="btn btn-md btn-warning"> <i class="fas fa-ban"></i>Cancelar</a>
            </div>
          </div>
        </form>
      </div>
    
    </div>
    <body>
  @endsection