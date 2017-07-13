@extends('Site.templates.template')
@section('content')
  @include('Site.includes.navbar')
  <div class="container">
    <h1 class="title-pg">
      <a href="{{route('home.index')}}">
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
    <p><b>Sindico:</b>{{($user->sindico == 1 ? "sim":"não")}}</p>
    <p><b>Apartamento:</b>{{$apartamento->numeroAp}}</p>
    <form class="" action="{{route('morador.destroy',$user->id)}}" method="post">
      {{ method_field('DELETE')}}
      {{csrf_field()}}
      <button class="btn btn-danger" type="submit" name="button">Deletar Usuário: {{$user->name}}</button>
    </form>
  </div>
@endsection
