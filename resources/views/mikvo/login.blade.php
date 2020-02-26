
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
      <form #loginForm="ngForm" (ngSubmit)="login()">
        <div class="form-group">
          <label for="email">Correo electrónico</label>
          <input type="email" class="form-control"  required id="email" name="email"
            #email="ngModel">
          <div *ngIf="submitted && f.username.errors" class="invalid-feedback">
            <div *ngIf="f.username.errors.required">Username is required</div>
          </div>
        </div>
        <div class="form-group">
          <label for="password_user">Contraseña</label>
          <input type="password" class="form-control" required id="password_user"
            name="password_user">
        </div>
        <hr>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block" [disabled]="loading">
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

