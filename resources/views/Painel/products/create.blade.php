@extends('Painel.templates.template')
@section('content')
  <h1 class="title-pg">Gestão de Produtos</h1>
  <form class="form" action="{{route('produtos.store')}}" method="post">
    {!! csrf_field() !!}
    <div class="form-group">
        <input class="form-control" type="text" name="name"placeholder="Nome">
    </div>
    <div class="form-group">
        <input class="form-control" type="number" name="number" placeholder="Número">
    </div>
    <div class="form-group">
      <select class="form-control" name="description">
        <option>Descrição</option>
        @foreach ($categories as $category)
          <option value="{{$category}}">{{$category}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label  for="">
        <input class="" type="checkbox" name="active" value="ture">
        Produto Ativo
      </label>
    </div>
    <div class="form-group">
      <textarea class="form-control" name="description" placeholder="Descrição"></textarea>
    </div>
    <button class="btn btn-success" type="submit" name="Cadastro">Cadstrar</button>
  </form>
@endsection
