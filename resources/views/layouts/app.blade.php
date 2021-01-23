<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Shuffle Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('client/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('client/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('client/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('client/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('client/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('client/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('client/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('client/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('client/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Shuffle - v2.3.0
  * Template URL: https://bootstrapmade.com/bootstrap-3-one-page-template-free-shuffle/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
@include('client.header')

<main id="main">
@yield('content')
</main>
<!-- ======= Footer ======= -->
<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-info">
          <h3>BBIS</h3>
          <p>
            Nairobi <br>
            PO. BOX 535022, Kenya<br><br>
            <strong>Phone:</strong> +254 705 5488 55<br>
            <strong>Email:</strong> info@bbis.com<br>
          </p>
          <div class="social-links mt-3">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="/#about">About us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="{{route('register')}}">Register</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>What we do</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">We help save lives</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Help patients and donors be matched</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Blood Management</a></li>
            <form action="{{route('logout')}}">
            <input type="submit" class="btn btn-danger" value="Logout">
            </form>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our weekly Newsletter</p>
          <form action="" method="post">
            <input type="email" name="email"><input type="submit" value="Subscribe">
          </form>

        </div>

      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong><span>BBIS</span></strong>. All Rights Reserved
    </div>
   
  </div>
</footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('client/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('client/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('client/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('client/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('client/assets/vendor/jquery-sticky/jquery.sticky.js')}}"></script>
  <script src="{{asset('client/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('client/assets/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('client/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('client/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('client/assets/vendor/venobox/venobox.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('client/assets/js/main.js')}}"></script>

</body>

</html>