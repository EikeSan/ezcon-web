@extends('Site.templates.template')
@section('content')
  @include('Site.includes.navbar')
<div class="container">


  <div class="row">
    <div class="col-md-19 text-center">
      <ul class="media-list col-md-6">
        <h1>
          <font color="blue">
            <p class="text-center text-primary">
              <a class="pull-left" href="{{route('contato')}}"><img class="media-object" src="{{url('assets/Site/img/contato.png')}}" height="90" width="80"></a>
              <b>Contatos</b>
            </p>
          </font>
        </h1>
        <h4>Entre em contato conosco aqui...</h4>
        <div class="section">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="col-md-10">
                  <form class="form" method="get" action="{{route('index')}}">
                    <div class="form-group">
                      <label>
                        <span class="glyphicon glyphicon-user" aria-hidden="true">
                          <b>Nome Completo:</b>
                        </span>
                      </label>
                      <br>
                      <input class="form-control" type="name" name="nome" placeholder="Seu nome completo" size="40">
                      <br>
                    </div>
                    <label >
                      <span class="glyphicon glyphicon-phone-alt" aria-hidden="true">
                        <b>Telefone:</b>
                      </span>
                    </label>
                    <br>
                    <input class="form-control" type="tel" name="telefone" placeholder="(DDD) 9 9999-9999" size="17">
                    <br>
                    <label>
                      <span class="glyphicon glyphicon-envelope" aria-hidden="true">
                        <b>E-mail:</b>
                      </span>
                    </label>
                    <br>
                    <input class="form-control" type="email" name="email" placeholder="email@exemplo.com" size="30">
                    <br>
                    <label>
                      <span class="glyphicon glyphicon-pencil">
                        <b>Sua Mensagem:</b>
                      </span>
                    </label>
                    <br>
                    <textarea class="form-control" rows="6" cols="55" maxlength="" placeholder="Insira sua mensagem aqui"></textarea>
                    <br>
                    <button type="submit" class="btn btn-primary">Enviar mensagem</button>
                  </form>
                </div>
                <div clas="col-md-1"></div>
              </div>
            </div>
          </div>
        </div>
      </ul>

      <div class="col-md-3">
        <div class="col-md-2">
          <img class="media-object" src="{{url('assets/Site/img/programador.png')}}" height="70" width="70">
        </div>
        <b>Eike Duarte Santiago</b>
        <br>eikesantz@hotmail.com
        <br>(82) 99930-2626</div>
      <div class="col-md-3">
        <div class="col-md-3">
          <img class="media-object" src="{{url('assets/Site/img/programadora.png')}}" height="70" width="70">
        </div>
        <b>Karlla Danielly de Souza</b>
        <br>karlladanielly94@hotmail.com
        <br>(82) 99608-9546</div>
    </div>
  </div>
</div>
<style type="text/css">
  label{
    float: left;
  }
</style>
@endsection
