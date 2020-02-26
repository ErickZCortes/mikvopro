<h1 class="h3 mb-2 text-gray-800">Perfil del usuario</h1>
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="text-center card shadow mb-4 mx-auto">
                <div class="card-body">
                    <img class="rounded-circle"
                        src="https://cursania.com/imagenes/usuario/foto/foto-usuario-cursania.png" alt="" width="200"
                        height="200">
                    <h4 class="mb-0">username</h4>
                    <span class="text-muted d-block mb-2">User Name</span>
                    <hr>
                    <span class="btn btn-primary btn-file">Cambiar Imagen<input type="file">
                    </span>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="col">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="FirstName">Nombre completo</label>
                                    <input type="text" id="FirstName" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="UserName">Usuario</label>
                                    <input type="text" id="UserName" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Email">Correo electrónico</label>
                                    <input type="email" id="Email" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Contraseña</label>
                                    <input type="password" id="password" class="form-control">
                                    <small id="passwordHelpInline" class="text-muted">
                                        Debe tener entre 8 y 15 caracteres de largo.
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="phone">Teléfono</label>
                                    <input type="tel" id="phone" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="company">Empresa</label>
                                    <input type="text" id="company" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="feInputState">Acceso</label>
                                    <input type="text" id="role" class="form-control-plaintext" readonly>
                                </div>
                            </div>
                            <div class="center">
                                <button class="btn btn-primary">Actualizar cuenta</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>