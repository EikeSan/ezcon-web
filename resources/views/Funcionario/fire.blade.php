@extends('Site.templates.template')

@section('content')
  @include('Site.includes.navbar')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <div class="panel-heading">Demitir Funcionario</div>
                <div class="panel-body">

                  @if (isset($user))

                    @foreach ($funcionarios as $funcionario)
                      <form class="form" action="{{route('funcionario.update2', $funcionario->id)}}" method="post">
                        {!! method_field('PUT') !!}
                    @endforeach

                    @else
                      <form class="form-horizontal" method="POST" action="{{ route('funcionario.store2') }}">
                  @endif


                        {{ csrf_field() }}
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
                                  <input id="name" type="text" class="form-control" name="name" value="{{$insert->name or $user->name}}" readonly="readonly" required autofocus>

                              </div>
                          </div>

                          <div class="form-group">
                              <label for="email" class="col-md-4 control-label">E-Mail</label>

                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control" name="email" value="{{$insert->email or $user->email}}" readonly="readonly" required>
                              </div>
                          </div>

                        <div class="form-group">
                            <label for="Funcao" class="col-md-4 control-label">Função</label>

                            <div class="col-md-6">
                              <input type="text" class="form-control" name="funcao" placeholder="Porteiro" value="{{$funcionario->funcao or old('funcao')}}" readonly="readonly" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Data Admissão" class="col-md-4 control-label">Data Admissão</label>

                            <div class="col-md-6">
                              <input type="date" class="form-control" name="data_admissao" placeholder="dd-mm-yyyy" value="{{ date('Y-m-d',strtotime($funcionario->data_admissao)) }}" readonly="readonly" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Data Demissão" class="col-md-4 control-label">Data Demissão</label>

                            <div class="col-md-6">
                              <input type="date" class="form-control" name="data_demissao" placeholder="dd-mm-yyyy" value="{{ date('Y-m-d') }}" pattern="\d{2,4}-\d{2}-\d{2,4}" required>
                            </div>
                        </div>
                        <input type="hidden" name="id_users" value="{{$insert->id or $user->id}}">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-danger">
                                    Demitir
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
