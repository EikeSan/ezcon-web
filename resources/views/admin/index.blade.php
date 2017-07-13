@extends('Site.templates.template')

@section('content')
  @include('Site.includes.navbar')
<div class="container">
  <h1 class="title-pg">Lista dos Moradores</h1>
  <a class="btn btn-success btn-add" href="{{route('morador.create')}}">
    <span class="glyphicon glyphicon-plus"/>
    Cadastrar
  </a>
  <table class="table table-striped">
    <tr>
      <th>Nome</th>
      <th>Apartamento</th>
      <th width="100px">Ações</th>
    </tr>
    @if ($moradores)

    @endif
    @foreach ($moradores as $morador)
      @foreach ($users as $user)
        @foreach ($apartamentos as $apartamento)
          @if ($user->id == $morador->id_users && $morador->id_apartamentos ==$apartamento->id)
            <tr>
              <td>{{$user->name}}</td>
              <td>{{$apartamento->numeroAp}}</td>
              <td>
                <a class="actions edit" href="{{route('morador.edit',$user->id)}}">
                  <span class="glyphicon glyphicon-pencil"/>
                </a>
                <a class="actions view" href="{{route('morador.show',$user->id)}}">
                  <span class="glyphicon glyphicon-eye-open"/>
                </a>
              </td>
            </tr>
          @endif
        @endforeach
      @endforeach
    @endforeach

</div>
  @endsection
