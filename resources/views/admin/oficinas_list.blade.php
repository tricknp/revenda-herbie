@extends('adminlte::page')

@section('title', 'Cadastro de Oficinas')

@section('content_header')
    <h1>Cadastro de Oficinas
    <a href="{{ route('oficinas.create') }}" 
       class="btn btn-primary pull-right" role="button">Novo</a>
    </h1>
@endsection

@section('content')

@if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>  
@endif

<table class="table table-striped">
  <tr>
    <th> Nome </th>
    <th> Ações </th>
  </tr>  

  @foreach($oficinas as $o)
  <tr>
    <td> {{$o->nome}}</td>
    <td> 
      <a href="{{route('oficinas.marcas', $o->id)}}" 
        class="btn btn-warning btn-sm" title="Alterar"
        role="button">Marcas Atendidas</a>
    </td>
  </tr>
  @endforeach

</table>

@endsection

@section('js')
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
@endsection