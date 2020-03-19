<header>
    <link rel="stylesheet"type="text/css" href="{{URL::asset('css/header.css')}}">
    <link rel="stylesheet"type="text/css" href="{{URL::asset('css/app.css')}}">
</header>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
  

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
      

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link " href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><kbd>{{$user->user_name}}</kbd></span>
                    @if (( $user->img_user ) == "null")
                    <img class="img-fluid img-profile rounded" src="{{ asset('uploads/user.png') }}"> 
                        @else
                        <img class="img-fluid img-profile rounded" src="{{ asset('uploads/'.$user->img_user ) }}">
                        @endif
            </a>
            <!-- Dropdown - User Information -->
            
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>
    <form id="logout-form"  method="POST"  action ="{{ route('logout') }}" style="display:none;">
        @csrf
    </form>
</nav>