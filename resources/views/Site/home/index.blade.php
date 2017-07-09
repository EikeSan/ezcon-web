@extends('Site.templates.template')
@section('content')
  @include('Site.includes.navbar')
  <div class="cover">
    <div class="navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-11 text-center">
          <img width="250px" height="250px" src="{{url('assets/Site/img/ezconLogo.png')}}" align="left-botton">
          <p class="text-inverse">
            <br>
            <br>
            <br>
            <b style="color: black">Seu condomínio a um clique de você.</b>
          </p>
          <a href="{{route('login')}}" class="btn btn-lg btn-primary">Login</a>
        </div>
      </div>
    </div>
  </div>

@endsection
