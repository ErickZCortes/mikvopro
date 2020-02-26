<div id="wrapper">  
    <div id="sidebar">
        @yield('sidebar')
    </div>                
    <div id="content-wrapper" class="d-flex flex-column"> 
       <div id="content">
            @yield('header')
                <div class="container-fluid">
                    @yield('contenido')
                </div>
        </div>
        @yield('footer')
    </div>
</div>