<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
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
                    @yield('content')
                </div>
            </div>
            @yield('footer')
        </div>
    </div>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'My First dataset',
                
                borderColor: 'rgb(52, 152, 219)',
                data: [0, 10, 5, 2, 20, 30, 45]
            }]
        },

            // Configuration options go here
            options: {}
        });
        var ctx = document.getElementById('myChart1').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green'],
            datasets: [{
                label: 'Votes',
                backgroundColor:['rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)'],
                borderColor:['rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'],
                data: [28, 50, 45, 26]
            }]
        },

            // Configuration options go here
            options: {}
        });
        var ctx = document.getElementById('myChart2').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'doughnut',

            // The data for our dataset
            data: {
            labels: ['Red',
					'Orange',
					'Yellow',
					'Green'
					],
            datasets: [{
                
                backgroundColor:['rgb(255, 99, 132, 0.2)',
                                'rgb(54, 162, 235, 0.2)',
                                'rgb(255, 206, 86, 0.2)',
                                'rgb(75, 192, 192, 0.2)'],
                borderColor:['rgb(255, 99, 132, 1)',
                            'rgb(54, 162, 235, 1)',
                            'rgb(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'],
                data: [8, 10, 5, 2]
            }]
        },

            // Configuration options go here
            options: {}
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>