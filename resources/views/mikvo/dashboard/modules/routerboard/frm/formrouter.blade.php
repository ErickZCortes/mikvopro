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
               placeholder="Ingresa la IP"
               >
         </div>
         </div>
         <div class="col-sm-10 col-md-4 col-lg-4">
         <div class="form-group">
            <label for="user_router">User:</label>
            <input 
               id="user_router"
               type="text" 
               class="form-control" 
               name="user_router"
               required
               value="{{ $routers->user_router }}"
               placeholder="Ingresa el usuario"
               >
         </div>
         </div>
         <div class="col-sm-10 col-md-4 col-lg-4">
         <div class="form-group">
            <label for="password_router">Password:</label>
            <input 
               id="password_router"
               type="text" 
               class="form-control" 
               name="password_router"
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
               placeholder="Ingresa la IP"
               >
         </div>
         </div>
         <div class="col-sm-10 col-md-4 col-lg-4">
         <div class="form-group">
            <label for="user_router">User:</label>
            <input 
               id="user_router"
               type="text" 
               class="form-control" 
               name="user_router"
               required
               placeholder="Ingresa el usuario"
               >
         </div>
         </div>
         <div class="col-sm-10 col-md-4 col-lg-4">
            <div class="form-group">
               <label for="password_router">Password:</label>
               <input 
                  id="password_router"
                  type="text" 
                  class="form-control" 
                  name="password_router"
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
               placeholder="Ingresa un puerto"
               >
         </div>
         </div>
         </div>
@endif
<button type="submit" class="btn btn-primary">Guardar</button>
<a href="{{ route('/dashboard/routerboard') }}" class="btn btn-warning">Cancelar</a>
