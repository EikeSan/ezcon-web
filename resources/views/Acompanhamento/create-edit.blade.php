@extends('Site.templates.template')

@section('content')
  @include('Site.includes.navbar')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <div class="panel-heading">Acompanhamento</div>
                <div class="panel-body">

                  @if (isset($acompanhamento))
                      <form class="form" action="{{route('acompanhamento.update', $acompanhamento->id)}}" method="post">
                        {!! method_field('PUT') !!}
                    @else
                      <form class="form-horizontal" method="POST" action="{{ route('acompanhamento.store') }}">
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
                            <label for="acompanhamento" class="col-md-4 control-label">Acompanhamento</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="acompanhamento" maxlength="50"  required >{{ $acompanhamento->acompanhamento or old('acompanhamento') }}</textarea>
                            </div>
                        </div>

                        <input type="hidden" name="id_ordem_servicos" value="{{(isset($ordemServico) ? $ordemServico->id : (isset($acompanhamento) ? $acompanhamento->id_ordem_servicos : ""))}}">


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Adicionar
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
