@extends('Painel.templates.template')

@section('content')
  <h1 class="title-pg">Listagem dos Produtos</h1>
  <a class="btn btn-success btn-add" href="{{route('produtos.create')}}">
    <span class="glyphicon glyphicon-plus"/>
    Cadastrar
  </a>
  <table class="table table-striped">
    <tr>
      <th>Nome</th>
      <th>Descrição</th>
      <th width="100px">Acçoes</th>
    </tr>
    @foreach ($products as $product)
      <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->description}}</td>
        <td>
          <a class="actions edit" href="{{route('produtos.edit',$product->id)}}">
            <span class="glyphicon glyphicon-pencil"/>
          </a>
          <a class="actions view" href="{{route('produtos.show',$product->id)}}">
            <span class="glyphicon glyphicon-eye-open"/>
          </a>
        </td>
      </tr>
    @endforeach
@endsection
