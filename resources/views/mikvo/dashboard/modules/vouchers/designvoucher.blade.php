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

<h1 class="h3 mb-2 text-gray-800">Design</h1>
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
      <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
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
            
            <div class="row col-md-3">
                <div class="col-md-12">
                    
                    
                    
                        
                        <div>
                            <a href="#" class="btn btn-danger">
                                <i class="fas fa-user"></i>
                                <span><strong>10 por hoja</strong></span>            
                            </a>
                        </div>
                        <div>
                            <a href="#" class="btn btn-info">
                                <i class="fas fa-user"></i>
                                <span><strong>21 por hoja QR</strong></span>        	
                            </a>
                        </div>
                        <div class="span1">
                            <button type="button" href="#" class="btn btn-primary btn-sm">
                                <i class="fas fa-user"></i>
                                <span><strong>21 por hoja Logo</strong></span>       
                            </button> 	
                        </div>
                        <div class="span1">
                            <button type="button" href="#" class="btn btn-primary btn-sm">
                                <i class="fas fa-user"></i>
                                <span><strong>36 por hoja QR</strong></span>
                                <p>                             {!! QrCode::size(250)->generate('.com'); !!}
                                </p>        	
                            </button>
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
        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row">
            <div class="col-md-12">

            </div>
           </div>
        </div>
    </div>
  </div>
@endsection