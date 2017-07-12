@extends('Site.templates.template')

@section('content')
  @include('Site.includes.navbar')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <div class="panel-heading">Cadastrar Morador 2/2</div>
                <div class="panel-body">

                  @if (isset($user))
                    @foreach ($moradores as $morador)
                      <form class="form" action="{{route('morador.update2', $morador->id)}}" method="post">
                        {!! method_field('PUT') !!}
                    @endforeach

                    @else
                      <form class="form-horizontal" method="POST" action="{{ route('morador.store2') }}">
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
                            <label for="Apartamento" class="col-md-4 control-label">Apartamento</label>

                            <div class="col-md-6">
                              <select class="form-control" name="id_apartamentos" required>
                                <option value="">Apartamento</option>
                                @foreach ($apartamentos as $apartamento)
                                  @if (isset($moradores))
                                    @foreach ($moradores as $morador )
                                      <option value="{{$apartamento->id}}"
                                      {{(isset($morador) && $morador->id_apartamentos == $apartamento->id ? "selected":(old('id_apartamentos') == $apartamento->id ? "selected":""))}} >
                                        {{$apartamento->numeroAp}}
                                      </option>
                                    @endforeach
                                    @else
                                      <option value="{{$apartamento->id}}"
                                      {{(old('id_apartamentos') == $apartamento->id ? "selected":"")}} >
                                        {{$apartamento->numeroAp}}
                                      </option>
                                  @endif
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <input type="hidden" name="id_users" value="{{$insert->id or $user->id}}">

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
