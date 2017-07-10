@extends('Site.templates.template')
@section('content')
  @include('Site.includes.navbar')
  <div class="container">
    <div class="cover">
      <div class="container">
        <div class="row">
          <div class="col-md-11 text-center">
            <img width="30%" height="30%" src="{{url('assets/Site/img/ezconLogo.png')}}">
            <p class="text-inverse">
              <br>
              <br>
              <b style="color: black">Seu condomínio a um clique de você.</b>
            </p>
            <a href="{{route('login')}}" class="btn btn-lg btn-primary">Login</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <style type="text/css">
    body{
      background: url(https://blog.nextin.com.br/wp-content/uploads/2015/04/IPTU-unidades-e-condom%C3%ADnio.png) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
  </style>
@endsection
