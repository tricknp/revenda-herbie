@extends('adminlte::page')

@section('title', 'Proposta dos Clientes')

@section('content_header')
    <h1>Listagem de propostas</h1>
@endsection

@section('content')

<table class="table table-striped">
  <tr>
    <th> Veículo </th>
    <th> Modelo </th>
    <th> Marca </th>
    <th> Nome </th>
    <th> E-mail </th>
    <th> Telefone </th>
    <th> Proposta </th>
    <th> Ações </th>
  </tr>  
@forelse($propostas as $p)
  <tr>
    <td>
        @if (Storage::exists($p->foto))
          <img src="{{url('storage/'.$p->foto)}}"
               style="width: 80px; height: 50px" 
               alt="Foto de Carro"> 
        @else
          <img src="{{url('storage/fotos/semfoto.jpg')}}"
               style="width: 80px; height: 50px" 
               alt="Sem foto"> 
        @endif
    </td>  
    <td> {{$p->modelo}}</td>
    <td> {{$p->marca}} </td>
    <td> {{$p->nome}} </td>
    <td> {{$p->email}} </td>
    <td> {{$p->telefone}} </td>
    <td> {{$p->descricao_proposta}}</td>
    <td>
        <a href="{{route ('resposta', $p->id) }}" 
            class="btn btn-warning btn-sm" title="Responder"
            role="button"><i class="fas fa-envelope"></i></a> &nbsp;&nbsp;
        <form style="display: inline-block"
              method="post"
              action="{{route('propostas.destroy', $p->id)}}"
              onsubmit="return confirm('Confirma Exclusão?')">
               {{method_field('delete')}}
               {{csrf_field()}}
              <button type="submit" title="Excluir"
                  class="btn btn-danger btn-sm">
                  <i class="far fa-trash-alt"></i>
              </button>
        </form>  
    </td>
@empty
  <tr><td colspan=8> Não há propostas cadastradas ou filtro da pesquisa não 
                     encontrou registros </td></tr>
@endforelse
</table>

@endsection
