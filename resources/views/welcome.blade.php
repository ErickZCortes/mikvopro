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
            background: linear-gradient(to right, #bdc3c7, #2c3e50);
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
            background: linear-gradient(to right, #314755, #26a0da);
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
        .site-footer
        {
          background-color:#26272b;
          padding:20px 0 20px;
          font-size:15px;
          line-height:24px;
          color:#737373;
        }
        .site-footer hr
        {
          border-top-color:#bbb;
          opacity:0.5
        }
        .site-footer hr.small
        {
          margin:20px 0
        }
        .site-footer h6
        {
          color:#fff;
          font-size:16px;
          text-transform:uppercase;
          margin-top:5px;
          letter-spacing:2px
        }
        .site-footer a
        {
          color:#737373;
        }
        .site-footer a:hover
        {
          color:#3366cc;
          text-decoration:none;
        }
        .footer-links
        {
          padding-left:0;
          list-style:none
        }
        .footer-links li
        {
          display:block
        }
        .footer-links a
        {
          color:#737373
        }
        .footer-links a:active,.footer-links a:focus,.footer-links a:hover
        {
          color:#3366cc;
          text-decoration:none;
        }
        .footer-links.inline li
        {
          display:inline-block
        }
        .site-footer .social-icons
        {
          text-align:right
        }
        .site-footer .social-icons a
        {
          width:40px;
          height:40px;
          line-height:40px;
          margin-left:6px;
          margin-right:0;
          border-radius:100%;
          background-color:#33353d
        }
        .copyright-text
        {
          margin:0
        }
        @media (max-width:991px)
        {
          .site-footer [class^=col-]
          {
            margin-bottom:30px
          }
        }
        @media (max-width:767px)
        {
          .site-footer
          {
            padding-bottom:0
          }
          .site-footer .copyright-text,.site-footer .social-icons
          {
            text-align:center
          }
        }
        .social-icons
        {
          padding-left:0;
          margin-bottom:0;
          list-style:none
        }
        .social-icons li
        {
          display:inline-block;
          margin-bottom:4px
        }
        .social-icons li.title
        {
          margin-right:15px;
          text-transform:uppercase;
          color:#96a2b2;
          font-weight:700;
          font-size:13px
        }
        .social-icons a{
          background-color:#eceeef;
          color:#818a91;
          font-size:16px;
          display:inline-block;
          line-height:44px;
          width:44px;
          height:44px;
          text-align:center;
          margin-right:8px;
          border-radius:100%;
          -webkit-transition:all .2s linear;
          -o-transition:all .2s linear;
          transition:all .2s linear
        }
        .social-icons a:active,.social-icons a:focus,.social-icons a:hover
        {
          color:#fff;
          background-color:#29aafe
        }
        .social-icons.size-sm a
        {
          line-height:34px;
          height:34px;
          width:34px;
          font-size:14px
        }
        .social-icons a.facebook:hover
        {
          background-color:#3b5998
        }
        .social-icons a.twitter:hover
        {
          background-color:#00aced
        }
        .social-icons a.linkedin:hover
        {
          background-color:#007bb6
        }
        .social-icons a.dribbble:hover
        {
          background-color:#ea4c89
        }
        @media (max-width:767px)
        {
          .social-icons li.title
          {
            display:block;
            margin-right:0;
            font-weight:600
          }
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
                    <a class="nav-link" href="#">Manual</a>
                  </li>
                  <li>
                    <a class="btn btn-outline-info" href="{{route('/login')}}" role="button">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('/register')}}" role="button">Registro</a>
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
                <div class="col-12 col-md-6 col-lg-5 text-center text-md-left">
                  <h1 class="display-3">Rapido, Seguro, Confiable</h1>
                  <h2 class="lead">Servicio de internet por fichas al alcance de tus manos</h2>
                </div>
                <div class="col-md-6">
                  <img alt="Image" src="{{URL::asset('/uploads/fastweb.png')}}" class=" img-fluid">
                </div>
              </div>
            </div>
          </header>
          <section class="bg-light text-center" style="padding: 4rem;">
            <div class="container">
              <div class="row">
                <div class="col-lg-4">
                  <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div>
                      <img src="{{URL::asset('/uploads/fastweb.png')}}" alt="img" width="170px" height="150px">
                    </div>
                    <h3>Fácil de usar</h3>
                    <p class="lead mb-0">Mikvo cuenta con una interfaz amigable para el usuario</p>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div>
                      <img src="{{URL::asset('/uploads/network.png')}}" alt="img" width="170px" height="150px">
                    </div>
                    <h3>Diseño y calidad</h3>
                    <p class="lead mb-0">Podrás agregar un toque de creatividad</p>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                    <div>
                      <img src="{{URL::asset('/uploads/transfer.png')}}" alt="img" width="170px" height="150px">
                    </div>
                    <h3>Almacenamiento</h3>
                    <p class="lead mb-0">Puedes agregar los routers que desees a nuestra aplicación</p>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <hr>
          <!-- Image Showcases -->
          <section class="showcase">
            <div class="container-fluid p-0">
              <div class="row no-gutters">
          
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('{{URL::asset('/uploads/code.jpg')}}');"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                  <div class="col-12 col-sm-8">
                    <i class="fas fa-terminal" style="font-size: 3rem"></i>
                    <h3 class="h1">Desarrollado en Laravel</h3>
                    <span class="lead">
                      Al ser uno de los framework más actuales y de calidad, Mikvo cuenta con la seguridad para todos sus procesos.
                    </span>
                  </div>
                </div>
              </div>
              <div class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url('{{URL::asset('/uploads/antenna.jpg')}}');"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                  <div class="col-12 col-sm-8">
                    <i class="fas fa-broadcast-tower" style="font-size: 3rem"></i>
                    <h3 class="h1">Cobertura</h3>
                    <span class="lead">
                      Con Mikvo puedes editar tus perfiles para asignarle cual será la cobertura de tus fichas
                    </span>
                  </div>
                </div>
              </div>
              <div class="row no-gutters">
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('{{URL::asset('/uploads/typing.jpg')}}');"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                  <div class="col-12 col-sm-8">
                    <i class="fas fa-desktop" style="font-size: 3rem"></i>
                    <h3 class="h1">Flexible y ágil</h3>
                    <span class="lead">
                      Adaptado para que puedas crear perfiles y fichas de internet con los parámetros que tu elijas.
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </section>
          
          <section class="bg-dark text-white" style="padding: 55px;">
            <div class="container">
              <div class="row justify-content-center text-center section-intro">
                <div class="col-12 col-md-9 col-lg-8">
                  <span><p style="vertical-align: inherit;">
                  <h2 class="display-4"><p style="vertical-align: inherit;">
                    <p style="vertical-align: inherit;">Mikvo, una aplicación de alta calidad a tu alcance</p></p></h2>
                  <span class="lead"><p style="vertical-align: inherit;">
                    <p style="vertical-align: inherit;">Disfruta de una aplicación flexible, adaptable a tus necesidades.</p></p></span>
                </div>
              </div>
            </div>
          </section>
          
          <!-- Call to Action -->
          
          <footer class="site-footer">
            <div class="container">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <h6>Mikvo</h6>
                  <p class="text-justify">Es una aplicación para la creación de fichas de internet con Mikrotik, desarrollada en Laravel, Adaptable a las necesiades de nuestros clientes y en constante desarrollo para brindar los mejores servicios.</p>
                </div>
                <div class="col-xs-6 col-md-3"></div>
                <div class="col-xs-6 col-md-3">
                  <h6>Acceso rápido</h6>
                  <ul class="footer-links">
                    <li><a href="{{ url('/home') }}">Inicio</a></li>
                    <li><a href="http://scanfcode.com/contact/">Manual</a></li>
                    <li><a href="{{route('/login')}}">Login</a></li>
                  </ul>
                </div>
              </div>
              <hr>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                  <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by Entosoft.
                  </p>
                </div>
      
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
                  </ul>
                </div>
              </div>
            </div>
      </footer>
           <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
