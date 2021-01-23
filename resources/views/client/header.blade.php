
  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex">

      <div class="logo mr-auto">
        {{-- <h1 class="text-light"><a href="index.html"><span>BBIMS</span></a></h1> --}}
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="/"><img src="{{asset('images/logo.jpg')}}" alt="" class="img-fluid"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="/">Home</a></li>
          <li><a href="#about">About Us</a></li>
  
          <li><a href="#contact">Contact Us</a></li>
          @if(auth()->user())
          <li><a href="/dashboard/home">Go to dashboard</a></li>
          
          @else
          <li><a href="/register">Register</a></li>
          <li><a href="/login">Login</a></li>
          @endif

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->