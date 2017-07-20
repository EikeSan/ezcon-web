@extends('Site.templates.template')
@include('Site.includes.navbar')
@section('content')


<div class="container">
  <a class="btn btn-success btn-add" href="{{route('acompanhamento.create',Auth::user()->id)}}">
    <span class="glyphicon glyphicon-plus"/>
    Novo acompanhamento
  </a>
  <section class='box-comentario'>
    {{-- <aside class='foto-contato'>
      <div></div>
    </aside> --}}
    <article class='comentario'>

      {{-- <header class='titulo-comentario'>
       <p>Titulo</p>
     </header> --}}

      @foreach ($acompanhamentos as $acompanhamento)
        {{$acompanhamento->acompanhamento}}

        <header class='titulo-comentario'>
          <a class="actions edit" href="{{route('acompanhamento.edit',$acompanhamento->id)}}">
            <span class="glyphicon glyphicon-pencil"/>
          </a>
          <a class="actions view" href="{{route('acompanhamento.show',$acompanhamento->id)}}">
            <span class="glyphicon glyphicon-eye-open"/>
          </a>
       </header>
      @endforeach


    </article>
  </section>
</div>


<style type="text/css">
.box-comentario {
width: 500px;
height: 200px;
margin-left: auto;
margin-right: auto;
padding: 5px;
}

.foto-contato {
width: 100px;
height: 80px;
float: left;
display: block;
}

.comentario {
width: 398px;
height: 200px;
background: #e3e3e3;
float: left;
}

.comentario:before {
/*content: '';*/
display: inline-block;
position: absolute;
border-color: transparent transparent #969696 transparent;
border-width: 8px;
border-style: solid;
margin-left: -8px;
margin-top: 25px;
transform:rotate(45deg);
-ms-transform:rotate(45deg); /* IE 9 */
-webkit-transform:rotate(45deg); /* Opera, Chrome, and Safari */
}

.foto-contato > div {
width: 80px;
height: 100%;
background: url('assets/Site/img/user.png') no-repeat;
background-size: 80px;
border-radius: 50%;
}

.titulo-comentario {
width: 100%;
height: 40px;
background: #969696;
}

</style>
@endsection
