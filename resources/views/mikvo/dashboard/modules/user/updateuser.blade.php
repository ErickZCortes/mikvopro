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
<div class="container">
            <div class="card shadow mb-4">
                <div class="card-body">
                <form method="POST" action="{{ route('/dashboard/user/update',$user->id) }}" role="form" enctype="multipart/form-data">
 
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fullname_user">Nombre completo</label>
                                    <input 
                                    id="fullname_user"
                                    type="text" 
                                    class="form-control" 
                                    name="fullname_user"
                                    value="{{ $user->fullname_user }}"
                                    required
                                    >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="user_name">Usuario</label>
                                    <input 
                                    id="user_name"
                                    type="text" 
                                    class="form-control" 
                                    name="user_name"
                                    value="{{ $user->user_name }}"
                                    required
                                    >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telephone_user">Teléfono</label>
                                    <input 
                                    id="telephone_user"
                                    type="text" 
                                    class="form-control" 
                                    name="telephone_user"
                                    value="{{ $user->telephone_user }}"
                                    required
                                    >
                                </div>
                                <div class="form-group col-md-6">
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
                                <label for="img_user" class="negrita">Selecciona una imagen:</label> 
                                <hr>            
                                <div>
                                <input name="img_user" type="file" id="img_user">   
                                </div>
                            <div class="center">
                                <button type="submit" class="btn btn-primary">Actualizar cuenta</button>
                            </div>
                        </form>
                    
                </div>

            </div>
</div>
@endif
</html>
@endsection
