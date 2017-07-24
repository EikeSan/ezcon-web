<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
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
                    <a href="{{route('login')}}">Home</a>
                  </li>

                  <li>
                    <a href="{{route('contato')}}">Contato</a>
                  </li>

                  @if (Auth::user())
                    <li>
                      <a href="{{route('os.index')}}">Ordem de Serviço</a>
                    </li>
                  @endif

                  @if (Auth::user() && (Auth::user()->type == 'admin' or Auth::user()->sindico == '1') )
                    <li>
                      <a href="{{route('home.index')}}">Moradores</a>
                    </li>
                  @endif

                  @if (Auth::user() && (Auth::user()->type == 'admin' or Auth::user()->sindico == '1')  )
                    <li>
                      <a href="{{route('funcionario.lista')}}">Funcionários</a>
                    </li>
                  @endif

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">

                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        {{-- <li><a href="{{ route('register') }}">Register</a></li> --}}
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>


<!-- Scripts -->
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
