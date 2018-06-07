@extends('layouts/app')

@section('content')

  <h1> Lista de carros </h1>
  <br>

  <table class="table table-striped">
    <tr>
      <th> Modelo </th>
      <th> Marca </th>
      <th> Cor </th>
      <th> Ano </th>
      <th> Preço R$ </th>
      <th> Combustível </th>
      <th> Data Cad. </th>
      <th> Foto </th>
    </tr>  
  
    @foreach($carros as $c)
  <tr>
    <td> {{$c->modelo}}</td>
    <td> {{$c->marca->nome}} </td>
    <td> {{$c->cor}} </td>
    <td> {{$c->ano}} </td>
    <td> {{number_format($c->preco, 2, ',', '.')}} </td>
    <td> {{$c->combustivel}} </td>
    <td> {{date_format($c->created_at, 'd/m/Y')}} </td>
    <td>
      @if (Storage::exists($c->foto))
        <img src="{{url('storage/'.$c->foto)}}"
             style="width: 80px; height: 50px" 
             alt="Foto de Carro"> 
      @else
        <img src="{{url('storage/fotos/semfoto.jpg')}}"
             style="width: 80px; height: 50px" 
             alt="Sem foto"> 
      @endif
    </td>  
  
    @endforeach
  </table>

@endsection

