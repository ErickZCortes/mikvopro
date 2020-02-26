<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registro</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito|Raleway|Roboto|Rubik&display=swap" rel="stylesheet">
  <link rel="stylesheet"type="text/css" href="{{URL::asset('css/register.css')}}">
  <link rel="stylesheet"type="text/css" href="{{URL::asset('css/app.css')}}">
</head>
<body>
  <div class="reg-form card shadow mb-4">
    <div class="card-body">
      <div class="text-center">
        <h2>Crear una cuenta</h2>
        <p>Comienza a administrar con Mikvo</p>
      </div>
      <div class="justify-content-center">
        <div>
          <form>
            <div class="form-row form-group">
              <div class="col">
                <label for="name">Nombre completo</label>
                <input class="form-control form-control-md" type="text" id="name" required />
              </div>
              <div class="col">
                <label for="company">Compañia</label>
                <input class="form-control form-control-md" type="text" id="company" required />
              </div>
            </div>
            <div class="form-row form-group">
              <div class="col">
                <label for="username">Nombre de usuario</label>
                <input class="form-control form-control-md" type="text" id="username" required />
              </div>
              <div class="col">
                <label for="email">Correo electrónico</label>
                <input class="form-control form-control-md" type="email" id="email" required />
              </div>
            </div>
            <div class="form-row form-group">
              <div class="col">
                <label for="password">Contraseña</label>
                <input class="form-control form-control-md" type="password" id="password" required />
                <small>La contraseña debe tener al menos 7 caracteres</small>
              </div>
            </div>
            <p class="text-small text-muted">Al hacer clic en "Crear una cuenta", aceptas nuestros <a
                href="#">Términos</a>,
              <a href="#">Política de privacidad</a>&nbsp;y <a href="#">Política de seguridad</a>
            </p>
            <br>
            <button class="btn btn-block btn-success btn-md" type="submit">Crear una cuenta</button>
          </form>
          <div class="text-center">
            <small>¿Ya tienes una cuenta? <a  href="{{ url('/login') }}">Ingresa aquí</a></small>
          </div>
        </div>
      </div>
    </div>
</div>
</body>
</html>