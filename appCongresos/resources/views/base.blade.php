<!DOCTYPE html>
<html lang="en">

<head>
  <base href="{{ url('front') }}/">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Web Congress</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio - v1.0.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>


<body>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <h1 class="text-light" style="margin: 35px 0px"><strong><span class="azull">Web</span>Congress</strong></h1>
 
       
      @auth
        <div class="profile">
          <img src="assets/img/profile-img.png" alt="" class="img-fluid rounded-circle">
          <h1 class="text-light">
            <a href="index.html">
              {{ Auth::user()->name }}
            </a>
          </h1>
        </div>
      @endauth
      
 
 
      <nav class="nav-menu">
        <ul>
          
          {{--
          <li class="{{ setActive('home') }}"><a href="{{ url('/') }}"><i class="bx bx-home"></i> <span>Home</span></a></li>
          --}}
          <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ url('/') }}"><i class="bx bx-home"></i> <span>Home</span></a></li>
          @guest
            <li class="{{ request()->routeIs('about') ? 'active' : '' }}"><a href="{{ url('/about') }}"><i class="bx bx-user-pin"></i> <span>About</span></a></li>
          @endguest
          
          @auth
            <li class="{{ request()->routeIs('ponencia.index') ? 'active' : '' }}"><a href="{{ url('/ponencia') }}"><i class="bx bx-book"></i> <span>Ponencias</span></a></li>
          @endauth
          
          
          @auth
          @if(Auth::user()->type == 'suscriptor' && Auth::user()->email_verified_at != null)
            <li class="{{ request()->routeIs('pagos') ? 'active' : '' }}"><a href="{{ url('/pagos') }}"><i class="bx bx-book"></i> <span>Pago</span></a></li>
          @endif
          @endauth
          
          
          @auth
          @if(Auth::user()->type == 'ponente' && Auth::user()->email_verified_at != null)
            <li class="{{ request()->routeIs('ponencia.create') ? 'active' : '' }}"><a href="{{ url('/ponencia/create') }}"><i class="bx bx-book-add"></i> <span>Crear ponencia</span></a></li>
          @endif
          @endauth
          
          
          
          @auth
          @if(Auth::user()->type == 'comite' && Auth::user()->email_verified_at != null)
            <li class="{{ request()->routeIs('ponenteCreate') ? 'active' : '' }}"><a href="{{ url('/ponenteCreate') }}"><i class="bx bx-user-voice"></i> <span>Crear ponente</span></a></li>
          @endif
          @endauth
          
          
          
          @auth
          @if(Auth::user()->type == 'admin' && Auth::user()->email_verified_at != null)
            <li class=""><a href="{{ url('/admin') }}"><i class="bx bx-user-voice"></i> <span>Zona de administración</span></a></li>
          @endif
          @endauth
          
          
          <li class="{{ request()->routeIs('contacto') ? 'active' : '' }}"><a href="{{ url('/contacto') }}"><i class="bx bx-home"></i> <span>Contacto</span></a></li>
          
          
          
        </ul>
      </nav><!-- .nav-menu -->
      <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    </div>
  </header><!-- End Header -->



    @yield('contenido')
    
    
    
        
       
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">

      <!-- Login y logout -->
      <div class="row" style="margin-bottom: 15px; margin-left: 0px;">

        
        @auth
        
          <div class="col-12" style="aling-items: center">
            <form class="form-inline my-2 my-lg-0" style="justify-content: center" action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-outline-danger">
                    {{ __('Salir') }}
                </button>
            </form>
          </div>
            
            
        @else
          <div class="col-6" style="aling-items: center">
            <a href= "{{ url('login') }}" class="btn btn-outline-primary  btn-rounded waves-effect">Login</a>
          </div>
          
          
          <div class="col-6" style="aling-items: center">
            <a href= "{{ url('register') }}" class="btn btn-outline-primary  btn-rounded waves-effect">Register</a>
          </div>
          
        @endauth
        

      </div>
      <!-- FIN Login y logout -->

      <div class="row">&nbsp;</div>

      <div class="copyright">
        &copy; Copyright <strong><span>WebCongress</span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
        Designed by <a href="#">MJ designers</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="{{url('frontback/borrarMensaje.js')}}"></script>
  

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>