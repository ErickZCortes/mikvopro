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
    <link rel="stylesheet"type="text/css" href="{{URL::asset('css/designvoucher.css')}}">
</header>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style style type="text/css" media="all">

    </style>
</head>
<h1 class="h3 mb-2 text-gray-800">Design</h1>
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
      <div>
        <form class="">
            <div class="row col-md-12 col-lg-12">
                <div class="col-md-4 title">Plantilla de vouchers:</div>
                <div class="col-md-4">
                    <select class="form-control" >
                        <option> Elige una opción</option>
                        <option>Plantilla 1</option>
                        <option>Plantilla 2</option>
                        <option>Plantilla 3</option>
                        <option>Plantilla 4</option>
                    </select>  
                </div> 
                <div class="col-md-4">
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </div>    
            </div>
            
            <div class="col-md-12"><hr></div>
            <div class="row col-md-12 text-center">
                  <div class="col-md-3">
                        <div class="col-md-12">
                            <select class="form-control">
                                <option value="none">Por hoja</option>
                                <option value="hojado">18 por hoja</option>
                                <option value="hojavu">21 por hoja</option>
                                <option value="hojac">50 por hoja</option>
                                <option>Automatico</option>
                            </select>
                      </div>
                  </div> 
                <div class="col-md-3">
                        <div class="col-md-12">
                            <select class="form-control">
                                <option value="">Por Logo</option>
                                <option value="">10 por hoja</option>
                                <option value="">21 por hoja</option>
                                <option value="">50 por hoja</option>
                                <option value="">Automatico</option>
                            </select>
                      </div>
                </div>  
                <div class="col-md-3">
                        <div class="col-md-12">
                            <select class="form-control">
                                <option value="">Por codigo QR</option>
                                <option value="">10 por hoja</option>
                                <option value="">21 por hoja</option>
                                <option value="">50 por hoja</option>
                                <option value="">Automatico</option>
                            </select>
                      </div>
                </div>    
                <div class="col-md-3">
                    <div class="">
                    <a href="{{route('/dashboard/vouchers/pdf', $voucher->id )}}" class="btn btn-dark"><i class="fas fa-file-pdf"></i> Exportar a PDF</a> 
                    </div>
                </div>  
            </div>
        </form>
      </div>
  </div>
</div>

@endsection