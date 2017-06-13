@extends('Site.templates.template1')

@section('content')
  <h1> Home Page do site!</h1>
  @if($var1 == '1223')
    <p> É igual </p>
  @else
    <p> É diferente </p>
  @endif

  @unless($var1 == '1231')
    <p> Não é igual unless </p>
  @endunless

  @for($i = 0; $i < 10; $i++)
    <p> For:{{$i}} </p>
  @endfor

{{--
  @if( count($arrayData) > 0)

    @foreach($arrayData as $array)
      <p> ForEach:{{$array}} </p>
    @endforeach

  @else
    <p> Não há itens </p>
  @endif
--}}

  @forelse($arrayData as $array)
    <p> ForElse:{{$array}} </p>
  @empty
    <p> ForElse: sem elemenotos
  @endforelse
@include('Site.includes.sidebar',compact('var1'))
@endsection

@push('scripts')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
@endpush
