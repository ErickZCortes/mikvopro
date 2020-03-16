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
@if(Session::has('message'))
<div class="alert alert-primary" role="alert">
    {{ Session::get('message') }}
</div>
@endif
    <h1 class="h3 mb-2 text-gray-800">Perfil del usuario</h1>
        <div class="text-center card shadow mb-4 mx-auto">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                            @if (( $user->img_user) == "null")
                            <img class="rounded mx-auto d-block" src="{{URL::asset('uploads/user.png') }}" alt="" width="250" height="250"> 
                                
                            @else
                                <img class="rounded mx-auto d-block" src="{{ asset('uploads/'.$user->img_user) }}" alt="" width="250" height="250">
                            @endif 
                            <hr>
                            <h4 class="mb-0 text-uppercase" >{{$user->user_name}}</h4>   
                    </div>
                    <div class="col-lg-8">
                        <form>
                            <br>
                             <div class="form-row">   
                                    
                                            <div class="form-group col-md-6">
                                                <label for="FirstName">Nombre completo:</label>
                                                <h5 class="text-capitalize">{{$user->fullname_user}}</h5>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="UserName">Teléfono:</label>
                                                <h5>{{$user->telephone_user}}</h5>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="Email">Correo electrónico:</label>
                                                <h5>{{$user->email_user}}</h5>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="Email">Registrado:</label>
                                                <h5>{{$user->created_at}}</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <a href="{{ route('/dashboard/user/edit', $user->id) }}" class="btn btn-success mt-4 ml-3">Editar usuario</a>
                                        </div>
                                    </form>            
                    </div>
                </div>
            </div>
        </div>
</html>
@endsection