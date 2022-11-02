<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Event Tabulation System</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets')}}/img/favicon22.png" rel="icon">
    <link href="{{asset('assets')}}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{asset('assets')}}/vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="{{asset('assets')}}/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">

     <!-- font awesome -->
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: Selecao - v2.3.1
  * Template URL: https://bootstrapmade.com/selecao-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  @yield('styles')

</head>

<body>

    <!-- ======= Header ======= -->

    {{-- @if(Request::url() !== url('/events/login'))
        <header id="header" class="fixed-top d-flex align-items-center">
    @else
        <header id="header" class="fixed-top d-flex align-items-center header-transparent ">
    @endif --}}
        <header id="header" class="fixed-top d-flex align-items-center">
            <div class="container d-flex align-items-center">

                <div class="logo mr-auto">
                    <h1 class="text-light"><a href="{{url('/')}}">Events</a></h1>
                </div>

                    <nav class="nav-menu d-none d-lg-block">
                        @if(Request::url() == url('/'))

                                <ul>
                                    <li class="active"><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="#about">About</a></li>
                                    <li><a href="#features">Features</a></li>
                                    <li><a href="#services">Services</a></li>
                                    <li><a href="#pricing">Pricing</a></li>
                                    <li><a href="#faq">FAQ</a></li>
                                    <li><a href="#contact">Contact</a></li>

                                    @if (!auth()->user())
                                        <li><a href="{{url('/login')}}">Login</a></li>
                                    @else
                                        <li><a href="{{url('/home')}}">Dashboard</a></li>
                                    @endif

                                </ul>

                        @else

                                <ul >
                                    <li><a href="{{url('/')}}" class="text-white">Home</a></li>
                                    <li><a href="{{url('/')}}#about" class="text-white">About</a></li>
                                    <li><a href="{{url('/')}}#features" class="text-white">Features</a></li>
                                    <li><a href="{{url('/')}}#services" class="text-white">Services</a></li>
                                    <li><a href="{{url('/')}}#pricing" class="text-white">Pricing</a></li>
                                    <li><a href="{{url('/')}}#faq" class="text-white">FAQ</a></li>
                                    <li><a href="{{url('/')}}#contact" class="text-white">Contact</a></li>

                                    @if(Request::url() == url('/login'))
                                        <li class="active"><a href="{{url('/login')}}" class="text-white">Login</a></li>
                                    @else
                                        <li><a href="{{url('/login')}}" class="text-white">Login</a></li>
                                    @endif


                                </ul>

                        @endif
                    </nav><!-- .nav-menu -->





            </div>
        </header><!-- End Header -->


        <!-- ======= CONTENT OF THE LANDING PAGE ======= -->
        @yield('content')


        <!-- ======= Footer ======= -->
        <footer id="footer">
            <div class="container">
                <h3>Events</h3>
                <h5 class="font-italic">"WORK SMARTER NOT HARDER"</h5>
                <div class="social-links">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
                <div class="copyright">
                    &copy; Copyright <strong><span>2021</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/selecao-bootstrap-template/ -->
                    Develop by <a href="{{url('/')}}">Team RAMA</a>
                </div>
            </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>

        <!-- Vendor JS Files -->
        <script src="{{asset('assets')}}/vendor/jquery/jquery.min.js"></script>
        <script src="{{asset('assets')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('assets')}}/vendor/jquery.easing/jquery.easing.min.js"></script>
        <script src="{{asset('assets')}}/vendor/php-email-form/validate.js"></script>
        <script src="{{asset('assets')}}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="{{asset('assets')}}/vendor/venobox/venobox.min.js"></script>
        <script src="{{asset('assets')}}/vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="{{asset('assets')}}/vendor/aos/aos.js"></script>

        <!-- Template Main JS File -->
        <script src="{{asset('assets')}}/js/main.js"></script>

</body>

</html>
