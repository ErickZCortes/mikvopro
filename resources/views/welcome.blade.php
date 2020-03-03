<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mikvo</title>

        <!-- Fonts -->
        <script src="https://kit.fontawesome.com/cf0dea4152.js" crossorigin="anonymous" SameSite="None" Secure></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito|Raleway|Roboto|Rubik&display=swap" rel="stylesheet">
        <link rel="stylesheet"type="text/css" href="{{URL::asset('css/app.css')}}">
        <!-- Styles -->
        <style>
          body{
            font-family: Tahoma;
          }
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Tahoma';
            font-weight: 700;
        }

        .btn-primary-outline {
            background-color: transparent;
            border-color: #EEE9E0;
            color: #EEE9E0;
            border-radius: 0%;
            border-width: 0.7mm;
            font-size: 0.4cm;
        }

        header.masthead {
            position: relative;
            background-color: #50B0AE;
            background: url("https://ak5.picdn.net/shutterstock/videos/3530885/thumb/1.jpg") no-repeat center center;
            background-size: cover;
            padding-top: 8rem;
            padding-bottom: 8rem;
        }
        
        header.masthead .overlay {
            position: absolute;
            background-color: #212529;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            opacity: 0.3;
        }
        
        header.masthead h1 {
            font-size: 2rem;
        }
  
        @media (min-width: 768px) {
            header.masthead {
            padding-top: 12rem;
            padding-bottom: 12rem;
            }
            header.masthead h1 {
            font-size: 3rem;
            }
        }
        
        .showcase .showcase-text {
            padding: 3rem;
        }
        
        .showcase .showcase-img {
            min-height: 30rem;
            background-size: cover;
        }
        
        @media (min-width: 768px) {
            .showcase .showcase-text {
            padding: 7rem;
            }
        }
  
        .features-icons {
            padding-top: 7rem;
            padding-bottom: 7rem;
        }
        
        .features-icons .features-icons-item {
            max-width: 20rem;
        }
        
        .features-icons .features-icons-item .features-icons-icon {
            height: 7rem;
        }
        
        .features-icons .features-icons-item .features-icons-icon i {
            font-size: 4.5rem;
        }
  
        .features-icons .features-icons-item:hover .features-icons-icon i {
            font-size: 5rem;
        }
        
        .testimonials {
            padding-top: 7rem;
            padding-bottom: 7rem;
        }
        
        .testimonials .testimonial-item {
            max-width: 18rem;
        }
        
        .testimonials .testimonial-item img {
            max-width: 12rem;
            box-shadow: 0px 5px 5px 0px #adb5bd;
        }
        
        .call-to-action {
            position: relative;
            background-color: #343a40;
            background: url("https://ak5.picdn.net/shutterstock/videos/3530885/thumb/1.jpg") no-repeat center center;
            background-size: cover;
            padding-top: 7rem;
            padding-bottom: 7rem;
        }

        .call-to-action .overlay {
            position: absolute;
            background-color: #212529;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            opacity: 0.3;
        }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container">
              <a class="navbar-brand" href="{{ url('/home') }}">Mikvo</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio
                      <span class="sr-only">(current)</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Nosotros</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Servicios</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Precios</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                  </li>
                  <li>
                    <a class="btn btn-outline-info" href="{{route('/login')}}" role="button">Login</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          
          <!-- Masthead -->
          <header class="masthead text-white text-center">
            <div class="overlay"></div>
            <div class="container">
              <div class="row">
                <div class="col-xl-9 mx-auto">
                  <h1 class="mb-5">Servicio de internet por fichas al alcance de tus manos</h1>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                  <form>
                    <div class="form-row">
                      <div class="col-12">
                        <a class="btn btn-primary-outline" >COMENZAR</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </header>
          
          <!-- Icons Grid -->
          <section class="features-icons bg-light text-center">
            <div class="container">
              <div class="row">
                <div class="col-lg-4">
                  <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                      <i class="icon-screen-desktop m-auto text-primary"></i>
                    </div>
                    <h3>Fully Responsive</h3>
                    <p class="lead mb-0">This theme will look great on any device, no matter the size!</p>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                      <i class="icon-layers m-auto text-primary"></i>
                    </div>
                    <h3>Bootstrap 4 Ready</h3>
                    <p class="lead mb-0">Featuring the latest build of the new Bootstrap 4 framework!</p>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                      <i class="icon-check m-auto text-primary"></i>
                    </div>
                    <h3>Easy to Use</h3>
                    <p class="lead mb-0">Ready to use with your own content, or customize the source files!</p>
                  </div>
                </div>
              </div>
            </div>
          </section>
          
          <!-- Image Showcases -->
          <section class="showcase">
            <div class="container-fluid p-0">
              <div class="row no-gutters">
          
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('https://i.ytimg.com/vi/rMd2Upb-jE8/maxresdefault.jpg');"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                  <h2>Fully Responsive Design</h2>
                  <p class="lead mb-0">When you use a theme created by Start Bootstrap, you know that the theme will look great on any device, whether it's a phone, tablet, or desktop the page will behave responsively!</p>
                </div>
              </div>
              <div class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url('https://i.ytimg.com/vi/rMd2Upb-jE8/maxresdefault.jpg');"></div>
                <div class="col-lg-6 my-auto showcase-text">
                  <h2>Updated For Bootstrap 4</h2>
                  <p class="lead mb-0">Newly improved, and full of great utility classes, Bootstrap 4 is leading the way in mobile responsive web development! All of the themes on Start Bootstrap are now using Bootstrap 4!</p>
                </div>
              </div>
              <div class="row no-gutters">
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('https://i.ytimg.com/vi/rMd2Upb-jE8/maxresdefault.jpg');"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                  <h2>Easy to Use &amp; Customize</h2>
                  <p class="lead mb-0">Landing Page is just HTML and CSS with a splash of SCSS for users who demand some deeper customization options. Out of the box, just add your content and images, and your new landing page will be ready to go!</p>
                </div>
              </div>
            </div>
          </section>
          
          <!-- Testimonials -->
          <section class="testimonials text-center bg-light">
            <div class="container">
              <h2 class="mb-5">What people are saying...</h2>
              <div class="row">
                <div class="col-lg-4">
                  <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img class="img-fluid rounded-circle mb-3" src="https://i.ytimg.com/vi/rMd2Upb-jE8/maxresdefault.jpg" alt="">
                    <h5>Margaret E.</h5>
                    <p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys!"</p>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img class="img-fluid rounded-circle mb-3" src="https://i.ytimg.com/vi/rMd2Upb-jE8/maxresdefault.jpg" alt="">
                    <h5>Fred S.</h5>
                    <p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of super nice landing pages."</p>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img class="img-fluid rounded-circle mb-3" src="https://i.ytimg.com/vi/rMd2Upb-jE8/maxresdefault.jpg" alt="">
                    <h5>Sarah W.</h5>
                    <p class="font-weight-light mb-0">"Thanks so much for making these free resources available to us!"</p>
                  </div>
                </div>
              </div>
            </div>
          </section>
          
          <!-- Call to Action -->
          <section class="call-to-action text-white text-center">
            <div class="overlay"></div>
            <div class="container">
              <div class="row">
                <div class="col-xl-9 mx-auto">
                  <h2 class="mb-4">Ready to get started? Sign up now!</h2>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                  <form>
                    <div class="form-row">
                      <div class="col-12 col-md-9 mb-2 mb-md-0">
                        <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">
                      </div>
                      <div class="col-12 col-md-3">
                        <button type="submit" class="btn btn-block btn-lg btn-primary" [routerLink]="['/login']">Sign up!</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>
           <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
