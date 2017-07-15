@extends('Site.templates.template')
@section('content')
  @include('Site.includes.navbar')
  <div class="container">
    <h1 class="title-pg">Lista dos Funcionario</h1>

    @if (Auth::user() && Auth::user()->type == 'admin')
      <a class="btn btn-success btn-add" href="{{route('funcionario.create')}}">
        <span class="glyphicon glyphicon-plus"/>
        Cadastrar
      </a>
    @endif

    <table class="table table-striped">
      <tr>
        <th>Nome</th>
        <th>Funcão</th>
        <th>Data Admissão</th>
        <th>Data Demissão</th>
        @if (Auth::user() && Auth::user()->type == 'admin')
          <th width="100px">Ações</th>
        @endif
      </tr>
    @if ($funcionarios)
      @foreach ($funcionarios as $funcionario)
        @foreach ($users as $user)
          @if ($user->id == $funcionario->id_users)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$funcionario->funcao}}</td>
                <td>{{date('d-m-Y',strtotime($funcionario->data_admissao))}}</td>
                <td>{{ ($funcionario->data_demissao != null  ? date('d-m-Y',strtotime($funcionario->data_demissao)) : "") }}</td>
                @if (Auth::user() && Auth::user()->type == 'admin')
                    <td>
                      <a class="actions edit" href="{{route('funcionario.edit',$user->id)}}">
                        <span class="glyphicon glyphicon-pencil"/>
                      </a>
                      <a class="actions view" href="{{route('funcionario.show',$user->id)}}">
                        <span class="glyphicon glyphicon-eye-open"/>
                      </a>
                      <a class="actions view" href="{{route('funcionario.fire',$user->id)}}">
                        <span class="glyphicon glyphicon-fire"/>
                      </a>
                    </td>
                @endif
            </tr>
          @endif
        @endforeach
      @endforeach
    @endif
  </div>


@endsection
