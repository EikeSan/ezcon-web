@extends('Site.templates.template')
@section('content')
@include('Site.includes.navbar')
  <div class="container">
    <h1>Ordem de Serviço</h1>
      <a href="{{route('os.lista',Auth::user()->id)}}">Lista</a>
  </div>

@endsection
