@extends('layout.main')
@section('content')

<center>
<div class="container">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ ('img/promo1.jpg') }}" class="d-block w-100" alt="keypora" height="920px">
            <div class="carousel-caption d-none d-md-block">
              <h5>title</h5>
              <p>loren ipsum</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{ ('img/promo2.jpg') }}" class="d-block w-100" alt="sirius" height="920px" >
            <div class="carousel-caption d-none d-md-block">
              <h5>title</h5>
              <p>loren ipsum</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{ ('img/promo3.jpg') }}" class="d-block w-100" alt="voidwalker" height="920px">
            <div class="carousel-caption d-none d-md-block">
              <h5>title</h5>
              <p>loren ipsum</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
      </button>
      </div>
</div>
</center>
@endsection