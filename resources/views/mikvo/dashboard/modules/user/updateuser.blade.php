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
<h1 class="h3 mb-2 text-gray-800">Editar perfil</h1>
            <div class="card shadow mb-4">
                <div class="card-body">
                <form method="POST" action="{{ route('/dashboard/user/update',$user->id) }}" role="form" enctype="multipart/form-data">
 
                    
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="fullname_user">Nombre completo</label>
                                    <input 
                                    id="fullname_user"
                                    type="text" 
                                    class="form-control text-capitalize" 
                                    name="fullname_user"
                                    minlength="8" maxlength="40"
                                    value="{{ $user->fullname_user }}"
                                    required
                                    >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="user_name">Usuario</label>
                                    <input 
                                    id="user_name"
                                    type="text" 
                                    class="form-control text-capitalize" 
                                    name="user_name"
                                    minlength="5" maxlength="15"
                                    value="{{ $user->user_name }}"
                                    required
                                    >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="telephone_user">Teléfono</label>
                                    <input 
                                    id="telephone_user"
                                    type="tel" 
                                    class="form-control" 
                                    name="telephone_user"
                                    pattern=".{10,}"
                                    maxlength="10"
                                    value="{{ $user->telephone_user }}"
                                    required
                                    >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="email_user">Email</label>
                                    <input 
                                    id="email_user"
                                    type="email" 
                                    class="form-control" 
                                    name="email_user"
                                    maxlength="40"
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                    value="{{ $user->email_user }}"
                                    required
                                    >
                                </div>
                                
                                <div class="col-md-12">
                                    <h5 class="mb-2 text-gray-500">Imagen de perfil</h5>
                                </div>
                                        <div class="col-md-6" style=" text-align: center; padding-top: 70PX;">
                                        <input type="file" name="img_user" type="file" id="img_user">
                                        </div>
                        
                                    <div class="col-md-6">
                                            <span>Imagen Actual:</span>
                                            @if (( $user->img_user) == "null")
                                                <img src="{{asset('uploads/user.png') }}" width="200" class="img-fluid">
                                                <br>
                                            @else
                                                <img src="{{URL::asset('uploads/'.$user->img_user) }}" width="200" class="img-fluid">
                                                <br>
                                            @endif 
                                            </span>
                                        </div>
                                    </div>
                                         
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