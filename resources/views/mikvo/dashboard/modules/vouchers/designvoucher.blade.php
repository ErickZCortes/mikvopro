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
    
<div class="card shadow mb-4">
  <div class="card-body">
      <div>
        <form method="POST" action="{{route('/dashboard/vouchers/pdf', $voucher->id )}}">
            @csrf  
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">  

            <div class="row col-md-12 col-lg-12 form-group">
                <div class="col-md-4 title">Plantilla de vouchers:</div>
                <div class="col-md-4">
                    <select class="form-control" name="template">
                        <option selected> Elige una opción</option>
                        @foreach ($templates as $template)
                        <option value="{{$template->id}}">{{$template->name_template}}</option>
                        @endforeach
                    </select>  
                </div> 
                   
            </div>
            
            <div class="col-md-12"><hr></div>
            <h1 class="h3 mb-2 text-gray-800">Formato</h1>
            <div class="row col-md-12 text-center form-group">
                  <div class="col-md-6">
                            <select class="form-control" name ="type_template">
                                <option value="none">Elije una opción</option>
                                <option value="hoja">Por hoja</option>
                                <option value="qr">Por QR</option>
                                <option value="logo">Por logo</option>
                            </select>
                  </div> 
                <div class="col-md-6 form-group">
                        <select class="form-control" name="amount_template">
                            <option value="none">Seleccione la cantidad de vouchers</option>
                            <option value="papervu">21 por hoja</option>
                            <option value="papertd">32 por hoja</option>
                        </select>
                  </div>
                <div class="col-md-12">
                    <div>
                    <button type="submit" class="btn btn-dark"><i class="fas fa-file-pdf"></i> Exportar a PDF</button> 
                    </div>
                </div>  
            </div>
        </form>
      </div>
  </div>
</div>

@endsection