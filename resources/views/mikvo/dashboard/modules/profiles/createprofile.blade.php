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
    <h1 class="h3 mb-2 text-gray-800">Profiles</h1>
    <div class="card shadow mb-4 col-md-12">
   <div class="card-body">
   <div class="row">
   <div class="col-md-8">
   <h5 id="title">Add Profiles</h5>
      
    <form method="POST" action="{{ route('/dashboard/profiles/store') }}" role="form" enctype="multipart/form-data">
 
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @include('mikvo.dashboard.modules.profiles.frm.formprofiles')     
    </form>
   </div>
   <div class="col-md-4">
   <div class="card shadow mb-4 col-md-12" style="background-color:black; color:white">
   dfdknlk Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste porro quidem rem voluptatem ex perferendis mollitia impedit explicabo expedita aspernatur architecto tempore voluptatum quos, reiciendis dignissimos nam odio laudantium quo. Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae accusantium similique necessitatibus, nam sapiente facilis cum iusto nemo asperiores ullam, officiis ad quas, incidunt aliquam voluptates perspiciatis deleniti! Quia, quibusdam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, suscipit unde! Doloremque maxime obcaecati veritatis unde voluptatum, corrupti quod vitae possimus! Repellendus tempore consectetur cumque sed sequi natus facilis excepturi.
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


