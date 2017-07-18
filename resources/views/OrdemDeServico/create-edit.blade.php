@extends('Site.templates.template')

@section('content')
  @include('Site.includes.navbar')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <div class="panel-heading">Nova Ordem de Serviço</div>
                <div class="panel-body">

                  @if (isset($user))
                      <form class="form" action="{{route('os.update', $user->id)}}" method="post">
                        {!! method_field('PUT') !!}
                    @else
                      <form class="form-horizontal" method="POST" action="{{ route('os.store') }}">
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
                            <label for="solicitante" class="col-md-4 control-label">Solicitante</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" readonly="readonly" name="solicitante" value="{{ Auth::user()->name }}" required autofocus>
                            </div>
                        </div>

                        <input type="hidden" name="id_moradors" value="{{$morador->id}}">

                        @if (Auth::user()->sindico == 1 or Auth::user()->type == 'admin')
                          <div class="form-group">
                              <label for="apartamento" class="col-md-4 control-label">Apartamento</label>
                              <div class="col-md-6">
                                <select class="form-control" name="id_apartamentos">
                                  <option value="">Número Apartamento</option>
                                  @foreach ($apartamentos as $apartamento )
                                    <option value="{{$apartamento->id}}">{{$apartamento->numeroAp}}</option>
                                  @endforeach
                                </select>
                              </div>
                          </div>
                          @else
                            <div class="form-group">
                                <label for="apartamento" class="col-md-4 control-label">Apartamento</label>
                                @foreach ($apartamentos as $apartamento )
                                  @foreach ($users as $user)
                                    @if ($user->id == $morador->id_users && $apartamento->id == $morador->id_apartamentos)
                                      <div class="col-md-6">
                                          <input  type="text" class="form-control" readonly="readonly" name="apartamento" value="{{ $apartamento->numeroAp }}" required autofocus>
                                          <input type="hidden" name="id_apartamentos" value="{{$apartamento->id}}">
                                      </div>
                                    @endif
                                  @endforeach
                                @endforeach
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="descricao" class="col-md-4 control-label">Descrição</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="descricao" maxlength="50"  required >{{ $ordemServico->descricao or old('descricao') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Tipo" class="col-md-4 control-label">Tipo</label>

                            <div class="col-md-6">
                              <select class="form-control" name="status" required>
                                <option value="">Status</option>
                                @foreach ($status as $astatus)
                                  <option value="{{$astatus}}">
                                  {{-- {{(isset($user) ? ($user->type == $type ? "selected":""):(old('type') == $type ? "selected":""))}} > --}}
                                    {{$astatus}}
                                  </option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        @if (Auth::user()->sindico == 1 or Auth::user()->type == 'admin')
                          <div class="form-group">
                            <label for="Funcionario" class="col-md-4 control-label">Funcionário</label>
                            <div class="col-md-6">
                              <select class="form-control" name="id_funcionarios" required>
                                <option value="">Funcionário</option>
                                @foreach ($funcionarios as $funcionario)
                                  @foreach ($users as $user)
                                    @if ($user->id == $funcionario->id_users)
                                      <option value="{{$funcionario->id}}">
                                      {{-- {{(isset($user) ? ($user->type == $type ? "selected":""):(old('type') == $type ? "selected":""))}} > --}}
                                        {{$user->name}}
                                      </option>
                                    @endif
                                  @endforeach
                                @endforeach
                              </select>
                            </div>
                          </div>
                        @endif



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Criar Solicitiação
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
