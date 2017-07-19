@extends('Site.templates.template')
@section('content')
  @include('Site.includes.navbar')
  <div class="container">
    <h1 class="title-pg">
      <a href="{{route('os.lista',Auth::user()->id)}}">
        <span class="glyphicon glyphicon-fast-backward"></span>
      </a>
      Ordem de Serviço Nº: <b>{{$ordemServico->id}}</b>
    </h1>
    @if (isset($errors) && count($errors) > 0)
      <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif
    <p><b>Solicitante:</b>{{$user->name}}</p>
    <p><b>Descrição:</b>{{$ordemServico->descricao}}</p>
    <p><b>Status:</b>{{$ordemServico->status}}</p>
    <p><b>Solução:</b>{{$ordemServico->solucao}}</p>



    <form class="" action="{{route('os.destroy',$ordemServico->id)}}" method="post">
      {{ method_field('DELETE')}}
      {{csrf_field()}}
      <input type="hidden" name="id_users" value="{{Auth::user()->id}}">
      <button class="btn btn-danger" type="submit" name="button">Deletar OS</button>
    </form>
  </div>
@endsection
