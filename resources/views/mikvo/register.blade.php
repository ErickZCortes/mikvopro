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
  <script type="text/javascript" src="{{URL::asset('js/telephone.js')}}"></script>
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
          <form method="POST" action="{{ route('/register/create') }}">
          @csrf
            <div class="form-row form-group">
              <div class="col">
                <label for="fullname_user">Nombre completo</label>
                <input 
                  class="form-control form-control-md" 
                  type="text" 
                  id="fullname_user" 
                  required
                  placeholder="Ingresa tu Nombre completo"
                  name="fullname_user"
                   />
              </div>
              <div class="col">
                <label for="user_name">Usuario</label>
                <input 
                  class="form-control form-control-md" 
                  type="text" 
                  id="user_name" 
                  required
                  placeholder="Ingresa tu Usuario"
                  name="user_name"
                  />
              </div>
            </div>
            <div class="form-row form-group">
              <div class="col">
                <label for="telephone_user">Teléfono</label>
                <input 
                class="form-control form-control-md rounded-0 w-100" 
                type="tel" 
                id="telephone_user" 
                required
                placeholder="(555)-555-5555"
                name="telephone_user"
                 />
              </div>
              <div class="col">
                <label for="email_user">Correo electrónico</label>
                <input 
                class="form-control form-control-md" 
                type="email" 
                id="email_user" 
                required 
                placeholder="Ingresa tu Correo electrónico"
                name="email_user"
                />
              </div>
            </div>
            <div class="form-row form-group">
              <div class="col">
                <label for="password_user">Contraseña</label>
                <input 
                class="form-control form-control-md" 
                type="password" 
                id="password_user" 
                required
                placeholder="Ingresa tu Contraseña"
                name="password_user"                
                 />
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
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>