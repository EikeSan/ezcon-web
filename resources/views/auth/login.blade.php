@extends('Site.templates.template')
@section('content')
  {{-- @include('Site.includes.navbar') --}}
  <nav class="navbar navbar-static-top">
      <div class="container">
          <div class="navbar-header">

              <!-- Collapsed Hamburger -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                  <span class="sr-only">Toggle Navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>

              <!-- Branding Image -->
              <a class="navbar-brand" href="{{ url('/') }}">
                  {{ config('app.name', 'Laravel') }}
              </a>
          </div>

          <div class="collapse navbar-collapse" id="app-navbar-collapse">
              <!-- Left Side Of Navbar -->
              <ul class="nav navbar-nav">
                  &nbsp;
              </ul>

              <ul class="nav navbar-nav navbar-left">

                <li>
                  <a href="{{route('index')}}">Home</a>
                </li>

                <li>
                  <a href="{{route('contato')}}">Contatos</a>
                </li>

              </ul>
          </div>
      </div>
  </nav>
</div>


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

  <div class="container">
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <section class="login-form">
        <form method="post" action="{{route('login')}}" role="login">
          {{ csrf_field() }}
          <img src="{{url('assets/Site/img/ezconLogo.png')}}" class="imglogo img-responsive" alt="ezcon logo" />

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" name="email" placeholder="email@email.com" required class="form-control input-lg"/>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Senha" required/>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>



          <div class="pwstrength_viewport_progress"></div>
          <button type="submit" name="login" class="btn btn-lg btn-primary btn-block">Entrar</button>
          <div>
            <a href="{{route('password.request')}}">Resetar senha</a>
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
