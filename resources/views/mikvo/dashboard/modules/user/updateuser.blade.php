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
    <link rel="stylesheet"type="text/css" href="{{URL::asset('css/userprofile.css')}}">
    <link rel="stylesheet"type="text/css" href="{{URL::asset('css/app.css')}}">
</header>

@endsection

@section('content')
<!DOCTYPE html>
<html lang="en">
<header>
    <link rel="stylesheet"type="text/css" href="{{URL::asset('css/userprofile.css')}}">
    <link rel="stylesheet"type="text/css" href="{{URL::asset('css/app.css')}}">
</header>
@if ( !empty ( $user->id) )
<h1 class="h3 mb-2 text-gray-800">Perfil del usuario</h1>
            <div class="card shadow mb-4">
                <div class="card-body">
                <form method="POST" action="{{ route('/dashboard/user/update',$user->id) }}" role="form" enctype="multipart/form-data">
 
                    
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="fullname_user">Nombre completo</label>
                                    <input 
                                    id="fullname_user"
                                    type="text" 
                                    class="form-control text-capitalize" 
                                    name="fullname_user"
                                    value="{{ $user->fullname_user }}"
                                    required
                                    >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="user_name">Usuario</label>
                                    <input 
                                    id="user_name"
                                    type="text" 
                                    class="form-control text-capitalize" 
                                    name="user_name"
                                    value="{{ $user->user_name }}"
                                    required
                                    >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="telephone_user">Teléfono</label>
                                    <input 
                                    id="telephone_user"
                                    type="tel" 
                                    class="form-control" 
                                    name="telephone_user"
                                    value="{{ $user->telephone_user }}"
                                    required
                                    >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email_user">Email</label>
                                    <input 
                                    id="email_user"
                                    type="email" 
                                    class="form-control" 
                                    name="email_user"
                                    value="{{ $user->email_user }}"
                                    required
                                    >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="password_user">Contraseña</label>
                                    <input 
                                    id="password_user"
                                    type="password" 
                                    class="form-control"
                                    value="{{ $user->password_user }}" 
                                    name="password_user"
                                    >
                                    <small id="passwordHelpInline" class="text-muted">
                                        Debe tener entre 8 y 15 caracteres de largo.
                                    </small>
                                </div>
                        
                                <div class="form-group col-md-12">
                                    <h5 class="mb-2 text-gray-500">Imagen de perfil</h5>
                                </div>
                                    <div class="col-md-6" style=" text-align: center;
                                    padding-top: 50PX;">
                                        <input class="btn btn btn-dark btn-file upld-file">Seleccionar archivo<input type="file" name="img_user" type="file" id="img_user">
                                    </div>
                                @if ( !empty ( $user->img_user) )
                                <div class="col-md-6">
                                    <span>Imagen Actual:</span>
                                        <img src="{{URL::asset('uploads/user.png') }}" width="200" class="img-fluid">
                                        <br>
                                        <div class="col-md-4 center">
                                    </span>
                                </div>
                        </div>
                  @else
                    Aún no se ha cargado una imagen para este producto
                  @endif                         
                    <div class=" col-md-12 center">
                        <br>
                        <button type="submit" class="btn btn-primary">Actualizar cuenta</button>
                    </div>
                </form>     
        </div>
    </div>

@endif
</html>
@endsection