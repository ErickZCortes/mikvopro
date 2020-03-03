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
                <label for="dns">DNS name:</label>
                <input type="text" class="form-control" id="dns" placeholder="Enter DNS name" name="dns"
                 >
              </div>
            </div>
            <div class="col-sm-10 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="numusers">Number of users:</label>
                <input type="number" class="form-control" id="numusers" placeholder="Enter Number of users" name="numusers"
                  >
              </div>
            </div>
            <div class="col-sm-10 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="server">Server:</label>
                <input type="text" class="form-control" id="server" placeholder="Enter Serve's name " name="server"
                 >
              </div>
            </div>
            <div class="col-sm-10 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="prefix">Prefix:</label>
                <input type="text" class="form-control" id="prefix" placeholder="Enter Prefix" name="prefix"
                >
              </div>
            </div>
            <div class="col-sm-10 col-md-4 col-lg-4">
              <div class="form-group">
                <label for="profile">Profile vouchers:</label>
                <select class="form-control" id="profile" name="profile" >
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                </select>
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