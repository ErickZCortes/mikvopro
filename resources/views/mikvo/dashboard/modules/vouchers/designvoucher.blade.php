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
        <div class="row">
            <div class="row col-md-6">
                <div class="col-md-3 title">Plantilla</div>
                <div class="col-md-9">
                    <select class="form-control" >
                        <option> Elige una opción</option>
                        <option>Plantilla 1</option>
                        <option>Plantilla 2</option>
                        <option>Plantilla 3</option>
                        <option>Plantilla 4</option>
                    </select>  
                </div>
            </div>
            
            <div class="row col-md-6">
                <div class="col-md-4 title">Reportes</div>
                <div class="col-md-8">
                    <select class="form-control" >
                        <option> Elige una opción</option>
                        <option>Reportes 1</option>
                        <option>Reportes 2</option>
                        <option>Reportes 3</option>
                        <option>Reportes 4</option>
                    </select>  
                </div>
            </div>
            <div class="col-md-12"><hr></div>
            <div class="row col-md-12 text-center">
                  <div class="col-md-3">
                    <div class="btn-group">
                        <button class="btn btn-secondary btn-md dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-file-text-o"></i> Por hoja
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">10 por hoja</a>
                            <a class="dropdown-item" href="#">21 por hoja</a>
                            <a class="dropdown-item" href="#">50 por hoja</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Automatico</a>
                        </div>
                      </div>
                </div>  

                <div class="col-md-3">
                    <div class="btn-group">
                        <button class="btn btn-secondary btn-md dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-qrcode"></i>                        
                            Por QR
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">5 por hoja</a>
                            <a class="dropdown-item" href="#">15 por hoja</a>
                            <a class="dropdown-item" href="#">25 por hoja</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Automatico</a>
                        </div>
                      </div>
                </div>  

                <div class="col-md-3">
                    <div class="btn-group">
                        <button class="btn btn-secondary btn-md dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-file-image"></i>
                            Por logo
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">10 por hoja</a>
                            <a class="dropdown-item" href="#">20 por hoja</a>
                            <a class="dropdown-item" href="#">30 por hoja</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Automatico</a>
                        </div>
                      </div>
                </div>    
                
                <div class="col-md-3">
                    <div class="">
                    <a href="{{route('/dashboard/vouchers/pdf')}}" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Exportar a PDF</a> 
                    </div>
                </div>  
            </div>
        </div>
      </div>
  </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <h1 class="h3 mb-2 text-gray-800">Preview</h1>
          <div class="row" style="justify-content:center">
                <div class="col-md-12" style="">
                    @include('mikvo.dashboard.modules.vouchers.pdf.pdfvoucher')
                </div>
           </div>
    </div>
  </div>
@endsection
