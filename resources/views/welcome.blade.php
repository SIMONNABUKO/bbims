@extends('layouts.client')

@section('content')
 
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active">
            <div class="carousel-background"><img src="{{asset('images/img4.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Get Help <span>Now!</span></h2>
                <p class="animate__animated animate__fadeInUp">Are you in dire need of help? Looking for matching blood group? Register to make appeal and let us handle the rest for you.</p>
                <a href="{{ route('register') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Register</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item">
            <div class="carousel-background"><img src="{{asset('images/bags.jpeg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Donate and help save life</h2>
                <p class="animate__animated animate__fadeInUp">A human race is a community, we depend on each other for survival. Your donation will contribute in saving millions of lives</p>
                <a href="{{ route('register') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Become a donor</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item">
            <div class="carousel-background"><img src="{{asset('images/img2.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Blood Appeal</h2>
                <p class="animate__animated animate__fadeInUp">Already registered as a patient and in need of blood transfusion? Make appeal and we will notify blood banks and donors near your area so that you get help as soon as possible</p>
                <a href="{{route('client.new.appeal')}}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Make Appeal</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-thin-double-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-thin-double-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->
  @include('client.about')
  @include('client.contact')
@endsection
