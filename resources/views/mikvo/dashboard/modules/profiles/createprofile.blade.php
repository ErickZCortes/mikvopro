@extends('mikvo.dashboard.layouts.default')
    @section('header')
        @include('mikvo.dashboard.shared.components.header')
        
    @endsection
    
    @section('sidebar')
        @include('mikvo.dashboard.shared.components.sidebar')
    @endsection
    
    @section('footer')
        @include('mikvo.dashboard.shared.components.footer')
    @endsection
    
    @section('css')
    <header>
      <link rel="stylesheet"type="text/css" href="{{URL::asset('css/routerboard.css')}}">
      <link rel="stylesheet"type="text/css" href="{{URL::asset('css/app.css')}}">
    </header>
    @endsection
    
    @section('content')
    <h1 class="h3 mb-2 text-gray-800">Perfiles</h1>
    <div class="card shadow mb-4 col-md-12">
   <div class="card-body">
   <div class="row">
   <div class="col-md-8">
   <h5 id="title">Agregar perfiles</h5>
      
    <form method="POST" action="{{ route('/dashboard/profiles/store') }}" role="form" enctype="multipart/form-data">
 
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @include('mikvo.dashboard.modules.profiles.frm.formprofiles')     
    </form>
   </div>
   <div class="col-md-4">
   <div class="card text-white bg-dark mb-7" style="max-width: 20rem;">
  <div class="card-header">Especificaciones</div>
  <div class="card-body">
    <h5 class="card-title">Opciones de Modo expiración</h5>
    <p class="card-text"><strong>- Eliminar</strong>: El usuario se eliminará cuando finalice el tiempo de espera.</p>
    <p class="card-text"><strong>- Avisar</strong>: El usuario no se ha eliminado y recibirá una notificación una vez que haya expirado.</p>
    <p class="card-text"><strong>- Registrar</strong>: Ealmacena los datos de precios para cada usuario que inicia sesión</p>
    <hr style="background-color:white">
    <p class="card-text"><strong>- Tiempo de espera</strong>: Se refiere al tiempo antes de que se elimine al usuario.</p>
    <hr style="background-color:white">
    <h5 class="card-title">Formato</h5>
    <p class="card-text">Tanto para <strong>Validación</strong> como para <strong>Tiempo de espera:</strong></p>
    <strong>Ejemplo: 20d = 20 días, 3h = 3 horas, 6m = 6 minutos</strong>
  </div>
</div>
   </div>
    </div>
      </div>
      
   </div>  
    <script type="text/javascript">
    
      function confirmdelete()
      {
      var x = confirm("¿Estas seguro de eliminar el perfil?");
      if (x)
        return true;
      else
        return false;
      }
    
    </script>

    @endsection


