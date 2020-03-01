@section('panel')
@if ( !empty ( $router->id) )
<div class="card shadow mb-4">
   <div class="card-body">
      <h5 id="title">Update Routers</h5>
      <div class="row">
         <div class="col-sm-10 col-md-4 col-lg-4">
         <div class="form-group">
            <label for="model_router">Model:</label>
            <input 
               id="model_router"
               type="text" 
               class="form-control" 
               name="model_router"
               required
               value="{{ $router->model_router }}"
               placeholder="Ingresa el modelo" 
               >
         </div>
         </div>
         <div class="col-sm-10 col-md-4 col-lg-4">
         <div class="form-group">
            <label for="router_description">Description:</label>
            <input 
               id="router_description"
               type="text" 
               class="form-control" 
               name="router_description"
               required
               value="{{ $router->router_description }}"
               placeholder="Ingresa la descripción"
               >
         </div>
         </div>
         <div class="col-sm-10 col-md-4 col-lg-4">
         <div class="form-group">
            <label for="ip_router">IP:</label>
            <input 
               id="ip_router"
               type="text" 
               class="form-control" 
               name="ip_router"
               required
               value="{{ $router->ip_router }}"
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
               value="{{ $router->user_router }}"
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
               required
               value="{{ $router->password_router }}"
               placeholder="Ingresa la contraseña"
               >
         </div>
         </div>
         </div>
      </div>
   </div>
</div>
@else
<div class="card shadow mb-4">
   <div class="card-body">
   <h5 id="title">Add Routers</h5>
      <div class="row">
         <div class="col-sm-10 col-md-4 col-lg-4">
         <div class="form-group">
            <label for="model_router">Model:</label>
            <input 
               id="model_router"
               type="text" 
               class="form-control" 
               name="model_router"
               required
               placeholder="Ingresa el modelo" 
               >
         </div>
         </div>
         <div class="col-sm-10 col-md-4 col-lg-4">
         <div class="form-group">
            <label for="router_description">Description:</label>
            <input 
               id="router_description"
               type="text" 
               class="form-control" 
               name="router_description"
               required
               placeholder="Ingresa la descripción"
               >
         </div>
         </div>
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
               required
               placeholder="Ingresa la contraseña"
               >
         </div>
         </div>
         </div>
      </div>
   </div>
</div>
@endif
<button type="submit" class="btn btn-primary">Guardar</button>
<a href="{{ route('dashboard/routerboard') }}" class="btn btn-warning">Cancelar</a>

@endsection