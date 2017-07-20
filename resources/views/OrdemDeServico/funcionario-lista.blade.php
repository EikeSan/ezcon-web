@extends('Site.templates.template')
@section('content')
@include('Site.includes.navbar')
  <div class="container">
    <h1 class="title-pg">Minhas Ordens de Serviço</h1>

    <div class="table-responsive">
      <table class="table table-striped">
        <tr>
          <th>ID</th>
          <th>Solicitante</th>
          <th>Apartamento</th>
          <th>Descrição</th>
          <th>Status</th>
          <th>Custo</th>
          <th>Funcionário</th>
          <th>Solução</th>
          {{-- @if (Auth::user() && Auth::user()->type == 'admin') --}}
            <th width="100px">Ações</th>
          {{-- @endif --}}
        </tr>
        @foreach ($apartamentos as $apartamento)
          @foreach ($ordemServicos as $ordemServico)
            @if ( $ordemServico->id_apartamentos == $apartamento->id)
              <tr>
                  <td>{{$ordemServico->id}}</td>

                  @foreach ($moradores as $morador)
                    @foreach ($users as $user )
                      @if ($ordemServico->id_moradors == $morador->id && $morador->id_users == $user->id)
                        <td>{{$user->name}}</td>
                      @endif
                    @endforeach
                  @endforeach

                  <td>{{$apartamento->numeroAp}}</td>
                  <td>{{$ordemServico->descricao}}</td>
                  <td>{{$ordemServico->status}}</td>
                  <td>{{$ordemServico->custo}}</td>

                    @foreach ($users as $funcionarioUser )
                      @if ($ordemServico->id_funcionarios == $funcionario->id && $funcionario->id_users == $funcionarioUser->id)
                        <td>{{$funcionarioUser->name}}</td>
                      @endif
                  @endforeach

                  <td>{{$ordemServico->solucao}}</td>

                  {{-- @if (Auth::user() && Auth::user()->type == 'admin') --}}
                      <td>
                        <a class="actions edit" href="{{route('os.edit',$ordemServico->id)}}">
                          <span class="glyphicon glyphicon-pencil"/>
                        </a>
                        <a class="actions view" href="{{route('os.show',$ordemServico->id)}}">
                          <span class="glyphicon glyphicon-eye-open"/>
                        </a>
                        <a href="{{route('acompanhamento.lista',$ordemServico->id)}}">
                          <span class="glyphicon glyphicon-comment"/>
                        </a>
                      </td>
                  {{-- @endif --}}
              </tr>
            @endif
          @endforeach
        @endforeach
      </table>
    </div>

  </div>

@endsection
