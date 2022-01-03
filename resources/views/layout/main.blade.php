<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dishcount</title>

    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <img src="{{ ('img/dishcount.png') }}" style="height:60px">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto" style="">
                <a class="nav-link text-dark @if(Request::is('/')) fw-bold @endif"   href="{{ url('/') }}">Home</a>
                <a class="nav-link text-dark @if(Request::is('promo')) fw-bold @endif" href="{{ url('/promo') }}">Promo</a>
                <a class="nav-link text-dark @if(Request::is('patient')) fw-bold @endif" href="{{ url('/patient') }}" >Membership</a>
            </div>
            <div class="navbar-nav ms-auto flex-nowrap">
              <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalCart">Login</button>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            @stack('before-content')
            @yield('content')
            @stack('after-content')
        </div>
    </div>

    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
    <footer class="bg-light text-center text-lg-start"style="margin-top:270px;">
    <div class="text-center p-3">
    ©2021 Copyright:
    <a class="text-dark" data-bs-toggle="modal" data-bs-target="#exampleModal4">Copyright 2021</a>
  </div>
</body>