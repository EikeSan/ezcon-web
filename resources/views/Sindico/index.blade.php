@extends('Site.templates.template')
@section('content')
  @include('Site.includes.navbar')
  <div class="container">
    <div class="row">
      <div class="col-md-19 text-center">
        <img width="200px" height="200px" src="{{url('assets/Site/img/ezconLogo.png')}}" align="left-botton">
        <p class="text-inverse">
          <b style="color: black">Seu condomínio a um clique de você.</b>
        </p>
        <ul>
          <h3>Síndico</h3>
        </ul>
        <ul class="media-list col-md-12">
          <h1>
            <font color="blue"></font>
            <div class="col-md-4" style="background-color:orange">
              <h2 style="color:black">
                <a href="{{route('home.index')}}"><b style="color: black">Gerenciar Morador</b></a>
              </h2>
            </div>
            <div class="col-md-4" style="background-color:orange">
              <h2 style="color:black">
                <a href="{{route('os.index')}}"><b style="color: black">Gerenciar OS</b></a>
              </h2>
            </div>
            <div class="col-md-4" style="background-color:orange">
              <h2 style="color:black">
                <a href="{{route('funcionario.lista')}}"><b style="color: black">Gerenciar Funcionário</b></a>
              </h2>
            </div>
          </h1>
        </ul>
      </div>
    </div>
  </div>

@endsection
