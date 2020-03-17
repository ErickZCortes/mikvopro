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
    <script>
        function bgOnChange(sel) {
            if(sel.value=="bgcolor"){
                divI = document.getElementById("div1");
                divI.style.display = "none";
                divC = document.getElementById("div2");
                divC.style.display = "";
            }else if(sel.value=="bgimage"){
                divC = document.getElementById("div2");
                divC.style.display ="none";
                divI = document.getElementById("div1");
                divI.style.display = "";
            }else if(sel.value=="none"){
                divC = document.getElementById("div2");
                divC.style.display = "none";
                divI = document.getElementById("div1");
                divI.style.display = "none";
            }
        }
    </script>
</head>
<body>
    <h1 class="h3 mb-2 text-gray-800">Create template</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
          <h5 id="title">New templates</h5>
            <form method="POST" action="{{ route('/dashboard/vouchers/template/create',$voucher->id) }}">
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
                                <option value="f1">fuente 1</option>
                                <option value="f2">fuente 2</option>
                                <option value="f3">fuente 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-10 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="logo_template">Logo:</label>
                            <input type="file" id="logo_template" name="logo_template" accept="image/*">
                        </div>
                    </div>
                    <div class="col-sm-10 col-md-4 col-lg-4">
                        <div class="form-group">
                        <label for="bg_voucher">Fondo para voucher:</label>
                        <select class="form-control" name="bg_voucher" id="bg_voucher" onchange="bgOnChange(this)">
                            <option selected value="none">Ninguno</option>
                            <option value="bgcolor">Color</option>
                            <option value="bgimage">Imagen</option>
                        </select>
                        </div>
                        <div class="col-sm-10 col-md-12 col-lg-12" id="div2" style="display: none;">
                            <div class="form-group" >
                                <label for="bgcolor_template">Color:</label>
                                <input type="color" id="bgcolor_template" name="bgcolor_template" value="#ed6868">
                            </div>
                        </div>
                        <div class="col-sm-10 col-md-12 col-lg-12" id="div1" style="display: none;">
                            <div class="form-group" >
                                <label for="bgimage_template">Imagen de fondo:</label>
                                <input type="file" id="bgimage_template" name="bgimage_template" accept="image/*">
                            </div>
                        </div>
                    </div>  
                    <div class="col-sm-10 col-md-4 col-lg-4" style="text-align: center; top: 28px; left: 23px;">
                        <button type="submit" class="btn btn-primary btn-xs"><i class="fa fa-download"></i> Guardar</button> 
                    </div>      
                </div>
            </form>
        </div>
    </div>
</body>
@endsection