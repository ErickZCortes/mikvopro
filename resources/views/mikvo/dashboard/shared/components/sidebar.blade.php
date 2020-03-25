<header>
    <link rel="stylesheet"type="text/css" href="{{URL::asset('css/sidebar.css')}}">
    <link rel="stylesheet"type="text/css" href="{{URL::asset('css/app.css')}}">
<link src="{{asset('public/js/sidebar.js')}}">
</header>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

   
@if (session()->has('routerConnected'))
 <!-- Sidebar - Brand -->
 <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('/dashboard')}}">
        <div class="sidebar-brand-text mx-3">Dashboard</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    
<li class="nav-item active">
        <a class="nav-link" href="{{route('/dashboard')}}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Gráficos</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        USUARIO
    </div>
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <i class="fas fa-user"></i>
            <span>Usuario</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones de perfil</h6>
                <a class="collapse-item" href="{{route('/dashboard/user')}}">Perfil</a>
                <a class="collapse-item" href="{{ route('/dashboard/user/edit', $user->id) }}">Editar perfil</a>
                <a class="collapse-item" href="{{ route('/dashboard/user/change-password', $user->id) }}">Cambiar contraseña</a>
              </div>  
          </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        ROUTERBOARD
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{route('/dashboard/routerboard')}}">
            <i class="far fa-hdd"></i>
            <span>Routerboard</span></a>
    </li>
  
    
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        VOUCHERS
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{route('/dashboard/vouchers')}}">
            <i class="fas fa-ticket-alt"></i>
            <span>Crear vouchers</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('/dashboard/profiles')}}">
            <i class="far fa-address-card"></i>
            <span>Perfiles</span></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{route('/dashboard/vouchers/reprint')}}">
            <i class="far fa-file-alt"></i>
            <span>Reimprimir vouchers</span></a>
    </li>

@else
 <!-- Sidebar - Brand -->
 <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('/dashboard/routerboard')}}">
        <div class="sidebar-brand-text mx-3">Dashboard</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    
<hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        USUARIO
    </div>
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <i class="fas fa-user"></i>
            <span>Usuario</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones de usuario</h6>
                <a class="collapse-item" href="{{route('/dashboard/user')}}">Perfil</a>
                <a class="collapse-item" href="{{ route('/dashboard/user/edit', $user->id) }}">Editar perfil</a>
                <a class="collapse-item" href="{{ route('/dashboard/user/change-password', $user->id) }}">Cambiar contraseña</a>
              </div>  
          </div>
    </li>
    <hr class="sidebar-divider">
<div class="sidebar-heading">
        ROUTERBOARD
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{route('/dashboard/routerboard')}}">
            <i class="far fa-hdd"></i>
            <span>Routerboard</span></a>
    </li>
    
@endif
    
    

    <!-- Nav Item - Pages Collapse Menu -->
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
    </div>

</ul>