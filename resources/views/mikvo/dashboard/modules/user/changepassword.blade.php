@extends('mikvo.dashboard.layouts.default')
@section('header')
    @include('mikvo.dashboard.shared.components.header')
    
@endsection

@section('sidebar')
    @include('mikvo.dashboard.shared.components.sidebar')
@endsection

@section('css')
<header>
    <link rel="stylesheet"type="text/css" href="{{URL::asset('css/changepassword.css')}}">
    <link rel="stylesheet"type="text/css" href="{{URL::asset('css/app.css')}}">
</header>

@endsection

@section('content')
<!DOCTYPE html>
<html lang="en">
<header>
    <link rel="stylesheet"type="text/css" href="{{URL::asset('css/changepassword.css')}}">
    <link rel="stylesheet"type="text/css" href="{{URL::asset('css/app.css')}}">
</header>

<h1 class="h3 mb-2 text-gray-800">Cambiar contraseña</h1>
<div class="text-center card shadow mb-4 mx-auto">
    <div class="card-body">
        <form method="post" action="{{url('/dashboard/user/updatepassword',$user->id)}}"> 
            @csrf
            <div class="row form-group">
                <div class="form-group col-md-6">
                    <label for="password_user"> Introduce tu actual contraseña:</label>
                    <input
                    type="password" 
                    class="form-control"
                    name="password_user"
                    pattern=".{8,}"
                    maxlength="15"
                    title="La contraseña debe tener al menos 8 caracteres">
                    
                </div>

                <div class="form-group col-md-6">
                    <label for="password_new">Introduce tu nueva contraseña:</label>
                    <input 
                    type="password" 
                    class="form-control"
                    name="password_new"
                    pattern=".{8,}"
                    maxlength="15"
                    title="La contraseña debe tener al menos 8 caracteres">
                </div>

                <div class="form-group col-md-6">
                    <label for="password_repeat">Confirma tu nuevo password:</label>
                    <input type="password" name="password_repeat" class="form-control"
                    pattern=".{8,}"
                    maxlength="15"
                    title="La contraseña debe tener al menos 8 caracteres">
                </div>
                <div class="col-md-6">
                <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Guardar</button>
                <a href="{{ route('/dashboard/user') }}" class="btn btn-warning"> <i class="fas fa-ban"></i> Cancelar</a>
            </div>
            </form>
    </div>
</div>
</html>
@endsection