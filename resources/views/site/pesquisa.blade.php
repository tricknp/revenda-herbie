@extends('layouts/app')

@section('content')

    <div class="col-sm-10">
        <h2>Pesquisa</h2>
    </div>    

    <div class="col-sm-2">
        <a href="{{route('carrossite.index') }}" class="btn btn-primary">Voltar</a
    </div>
    <br>

    <div id="pesquisa">
        @forelse($modelos as $c)    
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                        @if (Storage::exists($c->foto))
                        <img class="card-img-top" src="{{url('storage/'.$c->foto)}}"
                             style="width: 80px; height: 50px" 
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
                                <a href="{{route ('proposta', $c->id) }}" 
                                class="btn btn-primary">Fazer Proposta</a>
                                <br> <br> <br>
                    </div>
                    @empty
                        <h2>Não há carros com o modelo pesuisado</h2>
        @endforelse
    </div>
@endsection