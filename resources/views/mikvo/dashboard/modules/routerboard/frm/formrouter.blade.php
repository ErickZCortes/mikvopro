@if ( !empty ( $routers->id) )
      <div class="row">
         <div class="col-sm-10 col-md-4 col-lg-4">
         <div class="form-group">
            <label for="ip_router">IP:</label>
            <input 
               id="ip_router"
               type="text" 
               class="form-control" 
               name="ip_router"
               required
               value="{{ $routers->ip_router }}"
               pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$"
               minlength="7"
               maxlength="15"
               placeholder="Ingresa una dirección IP"
               >
         </div>
         </div>
         <div class="col-sm-10 col-md-4 col-lg-4">
         <div class="form-group">
            <label for="user_router">Usuario:</label>
            <input 
               id="user_router"
               type="text" 
               class="form-control" 
               name="user_router"
               required
               maxlength="15"
               value="{{ $routers->user_router }}"
               placeholder="Ingresa un usuario"
               >
         </div>
         </div>
         <div class="col-sm-10 col-md-4 col-lg-4">
         <div class="form-group">
            <label for="password_router">Contraseña:</label>
            <input 
               id="password_router"
               type="password" 
               class="form-control" 
               name="password_router"
               maxlength="20"
               value="{{ $routers->password_router }}"
               placeholder="Ingresa la contraseña"
               >
         </div>
         </div>
         <div class="col-sm-10 col-md-4 col-lg-4">
         <div class="form-group">
            <label for="port_router">Puerto:</label>
            <input 
               id="port_router"
               type="text" 
               class="form-control" 
               name="port_router"
               required
               minlength="2" maxlength="4"
               value="{{ $routers->port_router }}"
               placeholder="Ingresa un puerto"
               >
         </div>
         </div>
         </div>
@else
<div class="row">
         <div class="col-sm-10 col-md-4 col-lg-4">
         <div class="form-group">
            <label for="ip_router">IP:</label>
            <input 
               id="ip_router"
               type="text" 
               class="form-control" 
               name="ip_router"
               required
               pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$"
               minlength="7"
               maxlength="15"
               placeholder="Ingresa la IP"
               >
         </div>
         </div>
         <div class="col-sm-10 col-md-4 col-lg-4">
         <div class="form-group">
            <label for="user_router">Usuario:</label>
            <input 
               id="user_router"
               type="text" 
               class="form-control" 
               name="user_router"
               required
               maxlength="15"
               placeholder="Ingresa el usuario"
               >
         </div>
         </div>
         <div class="col-sm-10 col-md-4 col-lg-4">
            <div class="form-group">
               <label for="password_router">Contraseña:</label>
               <input 
                  id="password_router"
                  type="password" 
                  class="form-control" 
                  name="password_router"
                  maxlength="20"
                  placeholder="Ingresa la contraseña"
                  >
            </div>
         </div>
         <div class="col-sm-10 col-md-4 col-lg-4">
         <div class="form-group">
            <label for="port_router">Puerto:</label>
            <input 
               id="port_router"
               type="text" 
               class="form-control" 
               name="port_router"
               minlength="2" maxlength="4"
               required
               placeholder="Ingresa un puerto"
               >
         </div>
         </div>
         </div>
@endif
<button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Guardar</button>
<a href="{{ route('/dashboard/routerboard') }}" class="btn btn-warning"> <i class="fas fa-ban"></i> Cancelar</a>
