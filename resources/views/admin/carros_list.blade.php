{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')


@section('content_header')
    <h1>PAGINA PRINCIPAL</h1>
@stop

@section('content')
    <p>BEM VINDO A ESSA MARAVILHOSA PAGINA DE ADMIN, MEU PARCEIRO.</p>
@stop

<table class="table">
    <thead>
        <tr>
            <th>Modelo:</th>
            <th>Marca:</th>
            <th>Cor:</th>
            <th>Ano:</th>
            <th>Preço: R$</th>
            <th>Combustivel</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($carros as $c)
        <tr>
            <th> {{$c->modelo}} </th>
            <th> {{$c->marca->nome}} </th>
            <th> {{$c->cor}} </th>
            <th> {{$c->ano}} </th>
            <th> {{number_format($c->preco, 2, ',','.')}} </th>
            <th> {{$c->combustivel}} </th>
            <th> {{date_format($c->created_at, 'd/m/y')} </th>
        </tr>
        @empty
            <tr>
                <td>Não há carros cadastrados ou para o filtro informado</td>
            </tr>
    </tbody>
</table>