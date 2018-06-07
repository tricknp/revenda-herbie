@extends('adminlte::page')

@section('title', 'Cadastro de Marcas')

@section('content_header')
    <h1>Cadastro de Marcas
    <a href="{{ route('marcas.create') }}" 
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
    <th> Marca </th>
    <th> Ações </th>
  </tr>  
@forelse($marcas as $m)
  <tr>
    <td> {{$m->nome}}</td>
    <td> 
          <a href="{{route('marcas.edit', $m->id)}}" 
              class="btn btn-warning btn-sm" title="Alterar"
              role="button">
              <i class="fa fa-edit"></i>
          </a> 
        &nbsp;&nbsp;
        <form style="display: inline-block"
              method="post"
              action="{{route('marcas.destroy', $m->id)}}"
              onsubmit="return confirm('Confirma Exclusão?')">
               {{method_field('delete')}}
               {{csrf_field()}}
                <button type="submit" title="Excluir"
                    class="btn btn-danger btn-sm">
                    <i class="far fa-trash-alt"></i>
                </button>
        </form>  
    </td>
  </tr>
  @empty
  <tr><td colspan=8> Não há marcas cadastrados ou filtro da pesquisa não 
                     encontrou registros </td></tr>
  @endforelse
</table>
      
@endsection
