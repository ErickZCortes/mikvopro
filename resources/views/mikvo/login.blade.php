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
            autocomplete="email" 
            autofocus
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
            autocomplete="current-password">
            @error('password_user')
                <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
        <hr>
        <div class="form-group">
          <button class="btn btn-primary btn-block" >
            Ingresar
          </button>
          <a href="/reset-password" id="pass">¿Olvidó la contraseña?</a>
        </div>
        <span class="text-small">¿Aún no tienes una cuenta? <a href="{{url('/register')}}"> Crear cuenta</a></span>
      </form>
    </div>
</div>
</body>
</html>

