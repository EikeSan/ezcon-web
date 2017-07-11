@extends('Painel.templates.template')

@section('content')
  @include('Site.includes.navbar')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <div class="panel-heading">Cadastrar Morador 2/2</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('cadastrar2') }}">
                        {{ csrf_field() }}

                          <div class="form-group">
                              <label for="name" class="col-md-4 control-label">Nome</label>

                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control" name="name" value="" required autofocus>

                              </div>
                          </div>

                          <div class="form-group">
                              <label for="email" class="col-md-4 control-label">E-Mail</label>

                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control" name="email" value="" required>
                              </div>
                          </div>

                        <div class="form-group">
                            <label for="Apartamento" class="col-md-4 control-label">Apartamento</label>

                            <div class="col-md-6">
                              <select class="form-control" name="id_apartamentos" required>
                                <option value="">Apartamento</option>
                                @foreach ($apartamentos as $apartamento)
                                  <option value="{{$apartamento->id}}"
                                  {{(old('id_apartamentos') == $apartamento->id ? "selected":"")}} >
                                    {{$apartamento->numeroAp}}
                                  </option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <input type="hidden" name="id_users" value="">

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
