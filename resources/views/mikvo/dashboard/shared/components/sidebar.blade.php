<header>
    <link rel="stylesheet"type="text/css" href="{{URL::asset('css/sidebar.css')}}">
    <link rel="stylesheet"type="text/css" href="{{URL::asset('css/app.css')}}">
</header>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

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
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        USER
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{route('/dashboard/user')}}">
            <i class="fas fa-user-circle"></i>
            <span>User Profile</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        VOUCHERS
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{route('/dashboard/routerboard')}}">
            <i class="fas fa-record-vinyl"></i>
            <span>Routerboard</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('/dashboard/vouchers/create')}}">
            <i class="fas fa-ticket-alt"></i>
            <span>Create vouchers</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('/dashboard/profiles')}}">
            <i class="far fa-id-card"></i>
            <span>Profiles</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('/dashboard/vouchers/reprint')}}">
            <i class="far fa-file-alt"></i>
            <span>Reprint vouchers</span></a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>