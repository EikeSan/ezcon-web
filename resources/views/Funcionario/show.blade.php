@extends('Site.templates.template')
@section('content')
  @include('Site.includes.navbar')
  <div class="container">
    <h1 class="title-pg">
      <a href="{{route('funcionario.lista')}}">
        <span class="glyphicon glyphicon-fast-backward"></span>
      </a>
      Morador: <b>{{$user->name}}</b>
    </h1>
    @if (isset($errors) && count($errors) > 0)
      <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif
    <p><b>Nome:</b>{{$user->name}}</p>
    <p><b>Email:</b>{{$user->email}}</p>

    @foreach ($funcionarios as $funcionario)
      <p><b>Funcao:</b>{{$funcionario->funcao}}</p>
      <p><b>Data Admissão:</b>{{date('d-m-Y',strtotime($funcionario->data_admissao))}}</p>
      <p><b>Data Demissão:</b>{{ ($funcionario->data_demissao != null  ? date('d-m-Y',strtotime($funcionario->data_demissao)) : "")}} </p>
    @endforeach

    <form class="" action="{{route('funcionario.destroy',$user->id)}}" method="post">
      {{ method_field('DELETE')}}
      {{csrf_field()}}
      <button class="btn btn-danger" type="submit" name="button">Deletar Funcionário: {{$user->name}}</button>
    </form>
  </div>
@endsection
