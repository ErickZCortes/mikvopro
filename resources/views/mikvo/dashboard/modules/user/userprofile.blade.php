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
        <div class="text-center card shadow mb-4 mx-auto">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        @if (( $user->img_user) == "null")
                            <img class="rounded mx-auto d-block" src="../../../../uploads/user-default.png" alt="" width="250" height="220"> 
                        @else
                            <img class="rounded mx-auto d-block" src="../../../../uploads/{{$user->img_user}}" alt="" width="250" height="220">
                        @endif   
                        <hr>
                        <h4 class="mb-0 text-uppercase" >{{$user->user_name}}</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class=" col-md-12">
                               <div class="col-md-3"><span class="text-muted lead d-block mb-2">Nombre:</span></div>
                               <div class="col-md-9 text-capitalize"><h5>{{$user->fullname_user}}</h5></div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-3"><span class="text-muted lead d-block mb-2">Teléfono:</span></div>
                                <div class="col-md-9"><h5>{{$user->telephone_user}}</h5></div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-3"><span class="text-muted lead d-block mb-2">Email:</span></div>
                                <div class="col-md-9"><h5>{{$user->email_user}}</h5></div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-3"><span class="text-muted lead d-block mb-2">Registrado:</span></div>
                                <div class="col-md-9"><h5>{{$user->created_at}}</h5></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('/dashboard/user/edit', $user->id) }}" class="btn btn-success mt-4 ml-3">Editar usuario</a>
                    </div>
                </div>
            </div>
        </div>
</html>
@endsection
