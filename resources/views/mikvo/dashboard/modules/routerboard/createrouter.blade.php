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
    <h1 class="h3 mb-2 text-gray-800">Routerboar</h1>
    <div class="card shadow mb-4">
   <div class="card-body">
   <h5 id="title">Add Routers</h5>
      
    <form method="POST" action="{{ route('/dashboard/routerboard/store') }}" role="form" enctype="multipart/form-data">
 
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @include('mikvo.dashboard.modules.routerboard.frm.formrouter')     
    </form>
    </div>
      </div>
   
    <script type="text/javascript">
    
      function confirmdelete()
      {
      var x = confirm("¿Estas seguro de eliminar el router?");
      if (x)
        return true;
      else
        return false;
      }
    
    </script>

    @endsection


