@extends('Site.templates.template')

@section('content')
  @include('Site.includes.navbar')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <div class="panel-heading">Cadastrar Funcionario 1/2</div>
                <div class="panel-body">

                  @if (isset($user))
                      <form class="form" action="{{route('funcionario.update', $user->id)}}" method="post">
                        {!! method_field('PUT') !!}
                    @else
                      <form class="form-horizontal" method="POST" action="{{ route('funcionario.store') }}">
                  @endif

                        {!! csrf_field() !!}

                        @if (isset($errors) && count($errors) > 0)
                          <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                              <p>{{$error}}</p>
                            @endforeach
                          </div>
                        @endif

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" placeholder="João da Silva Santos" name="name" value="{{ $user->name or old('name') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" placeholder="joaosantos@email.com" name="email" value="{{ $user->email or old('email') }}" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Telefone" class="col-md-4 control-label">Telefone</label>

                            <div class="col-md-6">
                                <input id="Telefone" type="tel" class="form-control" min="10" maxlength="11" placeholder="82999999999" value="{{ $user->phone or old('phone')}}"name="phone" required>
                            </div>
                        </div>

                        <input type="hidden" name="type" value="funcionario">

                        @if (!isset($user))
                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              <label for="password" class="col-md-4 control-label">Senha</label>

                              <div class="col-md-6">
                                  <input id="password" type="password" class="form-control" placeholder="Sua Senha" name="password" required>

                                  @if ($errors->has('password'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="password-confirm" class="col-md-4 control-label">Confirme a Senha</label>

                              <div class="col-md-6">
                                  <input id="password-confirm" type="password" class="form-control" placeholder="Confirme Sua Senha" name="password_confirmation"required>
                              </div>
                          </div>

                        @endif

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
