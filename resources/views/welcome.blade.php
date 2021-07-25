@extends('layouts.app')


@section('content') 
<div class="row">
<div class="col mr-auto">
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators py-4">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner mr-auto">
    <div class="carousel-item active">
    <img src="images/yoga.jpg" class="d-block w-100" alt="..." >
    <div class="overlay overlay-a"></div>
      <div class="carousel-caption d-none d-md-block mb-5">
      <p class="intro-title-top">Offered Recreational Activity
                      <br> Instructor - Ms. Espina
          </p>
          <h1 class="intro-title mb-4">
            <span class="color-b">Yoga Class</span>
                      <br> Community Park
          </h1>
          <p class="intro-subtitle intro-price">
              <a href="/test"><span class="price-a">Enroll Now!</span></a>
          </p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/zumba.jpg" class="d-block w-100" alt="..." >
      <div class="overlay overlay-a"></div>
      <div class="carousel-caption d-none d-md-block mb-5">
      <p class="intro-title-top">Offered Recreational Activity
                      <br> Instructor - Ms. Espina
          </p>
          <h1 class="intro-title mb-4">
            <span class="color-b">Zumba Class</span>
                      <br> Covered Court
          </h1>
          <p class="intro-subtitle intro-price">
              <a href="/test"><span class="price-a">Enroll Now!</span></a>
          </p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/cardio.jpg" class="d-block w-100" alt="..." >
      <div class="overlay overlay-a"></div>
      <div class="carousel-caption d-none d-md-block mb-5">
      <p class="intro-title-top">Offered Recreational Activity
                      <br> Instructor - Ms. Nacario
          </p>
          <h1 class="intro-title mb-4">
            <span class="color-b">Cardio Class</span>
                      <br> Community Gym
          </h1>
          <p class="intro-subtitle intro-price">
              <a href="/test"><span class="price-a">Enroll Now!</span></a>
          </p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/funrun.jpg" class="d-block w-100" alt="...">
      <div class="overlay overlay-a"></div>
      <div class="carousel-caption d-none d-md-block mb-5">
      <p class="intro-title-top">Offered Recreational Activity
                      <br> Instructor - Ms. Nacario
          </p>
          <h1 class="intro-title mb-4">
          <span class="color-b">Fun Run</span>
                      <br> Subdivision Grounds | 5k Run
          </h1>
          <p class="intro-subtitle intro-price">
              <a href="/test"><span class="price-a">Enroll Now!</span></a>
          </p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div>




@endsection









