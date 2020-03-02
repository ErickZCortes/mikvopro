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

<h1 class="h3 mb-2 text-gray-800">Perfil del usuario</h1>
<div class="container">
            <div class="text-center card shadow mb-4 mx-auto">
                <div class="card-body">
                @if (( $user->img_user) == "null")
                <img class="rounded-circle"
                        src="../../../../uploads/user-default.png" alt="" width="200"
                        height="200"> 
              @else
              <img class="rounded-circle"
                        src="../../../../uploads/{{$user->img_user}}" alt="" width="200"
                        height="200">
                 
              @endif     
                <hr>
                    <h4 class="mb-0">{{$user->user_name}}</h4>
                    <span class="text-muted d-block mb-2">User Name</span>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                        {{$user->fullname_user}}
                            <span class="text-muted d-block mb-2">Nombre</span>
                        </div>
                        
                        <div class="col-md-6">
                        {{$user->telephone_user}}
                            <span class="text-muted d-block mb-2">Teléfono</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <a href="{{ route('/dashboard/user/edit', $user->id) }}" class="btn btn-success mt-4 ml-3">Editar usuario</a>
                        </div>
                    </div>
                </div>
            </div>
</div>
</html>
@endsection
