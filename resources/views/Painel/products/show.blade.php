@extends('Painel.templates.template')
@section('content')
  <h1 class="title-pg">
    <a href="{{route('produtos.index')}}">
      <span class="glyphicon glyphicon-fast-backward"></span>
    </a>
    Produto: <b>{{$product->name}}</b>
  </h1>
  @if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
      @endforeach
    </div>
  @endif
  <p><b>Ativo:</b>{{$product->active}}</p>
  <p><b>Número:</b>{{$product->number}}</p>
  <p><b>Categoria:</b>{{$product->category}}</p>
  <p><b>Descrição:</b>{{$product->description}}</p>
  <form class="" action="{{route('produtos.destroy',$product->id)}}" method="post">
    {!! method_field('DELETE')!!}
    {!!csrf_field()!!}
    <button class="btn btn-danger" type="submit" name="button">Deletar Produto: {{$product->name}}</button>
  </form>
@endsection
