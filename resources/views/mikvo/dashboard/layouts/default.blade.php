<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <script src="https://kit.fontawesome.com/cf0dea4152.js" crossorigin="anonymous" SameSite="None" Secure></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito|Raleway|Roboto|Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet"type="text/css" href="{{URL::asset('css/default.css')}}">
    <link rel="stylesheet"type="text/css" href="{{URL::asset('css/app.css')}}">
</head>
<body>
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
</body>
</html>