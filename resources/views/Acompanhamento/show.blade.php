@extends('Site.templates.template')
@section('content')
  @include('Site.includes.navbar')
  <div class="container">
    <h1 class="title-pg">
      <a href="{{route('acompanhamento.lista',$acompanhamento->id_ordem_servicos)}}">
        <span class="glyphicon glyphicon-fast-backward"></span>
      </a>
      Acompanhamento Nº: <b>{{$acompanhamento->id}}</b>
    </h1>
    @if (isset($errors) && count($errors) > 0)
      <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif
    <p><b>Acompanhamento:</b>{{$acompanhamento->acompanhamento}}</p>

    <form class="" action="{{route('acompanhamento.destroy',$acompanhamento->id)}}" method="post">
      {{ method_field('DELETE')}}
      {{csrf_field()}}
      <button class="btn btn-danger" type="submit" name="button">Deletar</button>
    </form>
  </div>
@endsection
