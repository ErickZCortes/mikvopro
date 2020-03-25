<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito|Raleway|Roboto|Rubik&display=swap" rel="stylesheet">
  <link rel="stylesheet"type="text/css" href="{{URL::asset('css/login.css')}}">
  <link rel="stylesheet"type="text/css" href="{{URL::asset('css/app.css')}}">
    
</head>
<body>
  <div class="login-form card shadow mb-4">
    <div class="card-body">
      <h2 class="mb-2 text-center">Iniciar sesión en Mikvo</h2>
      <p>Ingrese a su cuenta para continuar</p>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
          <label for="email_user">Correo electrónico</label>
          <input 
            id="email_user" 
            type="email" 
            class="form-control @error('email_user') is-invalid @enderror" 
            name="email_user" 
            value="{{ old('email_user') }}" 
            required 
            autofocus
            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
            maxlength="40"
            placeholder="Ingresa tu email">
            @error('email_user')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group {{ $errors->has('password_user')?'has-error' : ''}}">
          <label for="password_user">Contraseña</label>
          <input
            placeholder="Ingresa tu password"
            id="password_user" 
            type="password" 
            class="form-control @error('password_user') is-invalid @enderror" 
            name="password_user" 
            required
            pattern=".{8,}"
            placeholder="Ingresa una contraseña"
            title="La contraseña debe tener al menos 8 caracteres">
            @error('password_user')
                <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <hr>
        <div class="form-group">
          <button class="btn btn-primary btn-block" >
            Ingresar
          </button>
        </div>
        <span class="text-small">¿Aún no tienes una cuenta? <a href="{{route('/register')}}"> Crear cuenta</a></span>
      </form>
    </div>
</div>
@include('sweetalert::alert')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

