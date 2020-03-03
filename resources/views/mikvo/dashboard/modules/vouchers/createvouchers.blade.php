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
        <link rel="stylesheet"type="text/css" href="{{URL::asset('css/createvoucher.css')}}">
        <link rel="stylesheet"type="text/css" href="{{URL::asset('css/app.css')}}">
      </header>
    @endsection
    
    @section('content')
    <h1 class="h3 mb-2 text-gray-800">Vouchers</h1>
    <div class="card shadow mb-4">
      <div class="card-body">
        <h5 id="title">Create New Vouchers</h5>
        <form action="">
          <div class="row">
            <div class="col-sm-10 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="dnsname_voucher">DNS name:</label>
                <input 
                id="dnsname_voucher"
                type="text" 
                class="form-control" 
                name="dnsname_voucher"
                placeholder="Ingresa el DNS"
                 >
              </div>
            </div>
            <div class="col-sm-10 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="nusers_voucher">Number of users:</label>
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
                <label for="server_voucher">Server:</label>
                <input 
                  type="text" 
                  class="form-control" 
                  id="server_voucher" 
                  placeholder="Ingresa un servidor" 
                  name="server_voucher"
                 >
              </div>
            </div>
            <div class="col-sm-10 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="prefix_voucher">Prefix:</label>
                <input 
                  type="text" 
                  class="form-control" 
                  id="prefix_voucher" 
                  placeholder="Ingresa el prefijo" 
                  name="prefix_voucher"
                >
              </div>
            </div>
            
            <div class="col-sm-10 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="profile">Profile vouchers:</label>
                @foreach ($profiles as $profile)
                <select class="form-control" id="profile" name="profile" >
                  <option selected> Elige una opción</option>
                  <option>{{$profile->name_profile}}</option>
                </select>
                @endforeach
              </div>
            </div>
            <div id="btnform" class="col-sm-10 col-md-4 col-lg-4">
              <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-check-square"></i> Generar</button>
            </div>
          </div>
        </form>
      </div>
    
    </div>
    
  @endsection