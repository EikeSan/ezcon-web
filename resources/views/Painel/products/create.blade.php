@extends('Painel.templates.template')
@section('content')
  <h1 class="title-pg">Gestão de Produtos</h1>
  @if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
      @endforeach
    </div>
  @endif
  <form class="form" action="{{route('produtos.store')}}" method="post">
    {!! csrf_field() !!}
    <div class="form-group">
        <input class="form-control" type="text" name="name" placeholder="Nome" value="{{old('name')}}" required>
    </div>
    <div class="form-group">
        <input class="form-control" type="number" name="number" placeholder="Número" value="{{old('number')}}" required>
    </div>
    <div class="form-group">
      <select class="form-control" name="category" required>
        <option value="">Categoria</option>
        @foreach ($categories as $category)
          <option value="{{$category}}">{{$category}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label>
        <input  type="checkbox" name="active" value="1">
        Produto Ativo
      </label>
    </div>
    <div class="form-group">
      <textarea class="form-control" name="description" placeholder="Descrição" maxlength="1000">{{old('description')}}</textarea>
    </div>
    <button class="btn btn-success" type="submit">Cadstrar</button>
  </form>
@endsection
