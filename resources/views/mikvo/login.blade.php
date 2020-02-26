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
        <span class="text-small">¿Aún no tienes una cuenta? <a href="{{ route('register') }}"> Crear cuenta</a></span>
      </form>
    </div>
</div>