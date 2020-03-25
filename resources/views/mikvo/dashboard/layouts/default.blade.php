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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-streaming@latest/dist/chartjs-plugin-streaming.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
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
                    @yield('content')
                </div>
            </div>
            @yield('footer')
        </div>
    </div>
    @include('sweetalert::alert')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>   
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>