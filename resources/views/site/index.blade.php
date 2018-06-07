@extends('layouts/app')

@section('content')
<div id="search">
        <form class="form-inline" style="width: 100%;
        margin-top: -1.5%;"
        action="{{route ('pesquisa') }}" method="get">
            <input class="form-control mr-sm-2" type="search"  style="width: 90%;"
            placeholder="Qual modelo deseja?" aria-label="Search"
            name="s" value="{{ isset($s) ? $s : '' }}">

            <button class="btn btn-outline-success my-2 my-sm-0" style="color: #fff; background:#387bad;" 
            type="submit">Pesquisar</button>
        </form>
    </div>     
<div class="col-sm-12">
    <h1 style="text-align: center;">Carros em Destaque</h1>
    <br>
</div>    
    @forelse ($carros as $c)
    <div class="col-sm-3">
    <div class="card" style="width: 18rem;
        border: solid 3px rgba(0,0,0,.5);
        border-radius: 5px;
        width: 15em;
        text-align: center;
        margin-top: 5em; 
        height: 17em;
        background: rgba(0,0,0,.1)
    ">
                @if (Storage::exists($c->foto))
                <img class="card-img-top" src="{{url('storage/'.$c->foto)}}"
                     style="width: 80px; 
                     height: 50px; 
                     margin-top: 2em;" 
                     alt="Foto de Carro"> 
                @else
                <img class="card-img-top" src="{{url('storage/fotos/semfoto.jpg')}}"
                     style="width: 80px; height: 50px" 
                     alt="Sem foto"> 
                @endif
            <div class="card-body">
                  <h5 class="card-title">{{$c->modelo}}</h5>
                     <p class="card-text">
                        Preço - {{$c->preco}} 
                        <br>
                        Ano - {{$c->ano}}
                        <br>
                        Combustivel - {{$c->combustivel}}
                        </p>
                        <a href="{{route ('proposta', $c->id) }}" class="btn btn-primary">Fazer Proposta</a>
                        <br> <br> <br>
            </div>
        </div>
    </div>    
        @empty
            <h1>Não há veículos em destaque</h1>
        
    @endforelse

    
@stop