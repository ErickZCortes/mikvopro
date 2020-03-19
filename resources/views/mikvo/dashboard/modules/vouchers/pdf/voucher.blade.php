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
   
</head>
<body>
    <h1 class="h3 mb-2 text-gray-800">Create template</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
          <h5 id="title">New templates</h5>
            <form method="POST" action="{{ route('/dashboard/vouchers/template/create',$voucher->id) }}" role="form" enctype="multipart/form-data">
                @csrf  
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                <div class="row">
                    <div class="col-sm-10 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="name_template">Nombre:</label>
                        <input 
                        id="name_template"
                        type="text" 
                        class="form-control" 
                        name="name_template"
                        required
                        placeholder="Ingresa el nombre para la plantilla">
                    </div>
                    </div>
                    <div class="col-sm-10 col-md-4 col-lg-4">        
                        <div class="form-group">
                            <label for="font_template">Fuente para voucher:</label>
                            <select class="form-control" name="font_template" id="font_template" >
                                <option value="nada" selected>Seleciona un tipo de fuente</option>
                                <option value="Courier">Courier</option>
                                <option value="Helvetica">Helvetica</option>
                                <option value="Times-Roman">Times-Roman</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-10 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="logo_template">Logo:</label>
                            <input type="file" id="logo_template" name="logo_template" accept="image/*">
                        </div>
                    </div>
                    
                        <div class="col-sm-10 col-md-4" id="div2">
                            <div class="form-group" >
                                <label for="bgcolor_template">Color de fondo:</label>
                                <input type="color" id="bgcolor_template" name="bgcolor_template" value="#ffffff">
                            </div>
                        </div>
                        <div class="col-sm-10 col-md-4">
                            <div class="form-group" >
                                <label for="bgcolor_template">Color de etiqueta:</label>
                                <input type="color" id="bgcolor_template" name="color_etiqueta" value="#ffffff">
                            </div>
                        </div>  
                        <div class="col-sm-10 col-md-12 col-lg-12" style="text-align: center; top: 28px; left: 23px;">
                            <button type="submit" class="btn btn-primary btn-xs"><i class="fa fa-download"></i> Guardar</button> 
                        </div> 
                </div>
            </form>
        </div>
</div>
</body>
@endsection