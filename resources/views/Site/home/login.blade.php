@extends('Site.templates.template')
@section('content')
  @include('Site.includes.navbar')
  <div class="container">
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <section class="login-form">
        <form method="post" action="{{route('login')}}" role="login">
          {!! csrf_field() !!}
          <img src="{{url('assets/Site/img/ezconLogo.png')}}" class="imglogo img-responsive" alt="ezcon logo" />
          <input type="email" name="email" placeholder="email@email.com" required class="form-control input-lg" value="" />
          <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Senha" required value="" />
          <div class="pwstrength_viewport_progress"></div>
          <button type="submit" name="login" class="btn btn-lg btn-primary btn-block">Entrar</button>
          <div>
            <a href="#">Resetar senha</a>
          </div>
        </form>
        <div class="form-links">
          <a href="{{url('http://ezcon.com')}}">www.ezcon.com</a>
        </div>
      </section>
      </div>
      <div class="col-md-4"></div>
  </div>
</div>

@endsection
