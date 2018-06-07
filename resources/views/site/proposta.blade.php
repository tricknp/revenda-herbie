@extends('layouts/app')

@section('content')
<div class="col-sm-12">
  <h1>Proposta</h1>
  <br>
</div>

<div id="foto">
  <div class="col-sm-4">
    <div class="card" style="width: 18rem;">
      @if (Storage::exists($carro->foto))
          <img class="card-img-top" src="{url('storage/'.$c->foto)}"
          style="width: 80px; height: 50px" 
          alt="Foto de carro"> 
      @else
      <img class="card-img-top" src="{url('storage/fotos/semfoto.jpg')}"
      style="width: 80px; height: 50px" 
      alt="Sem foto"> 
      @endif
    </div>
    <br>
  </div>
</div>


<div class="col-sm-12">
  <div class="col-sm-2">
    <p>Marca - {{$nomemarca}}</p>
  </div>
  
  <div class="col-sm-2">
    <p>Modelo - {{$carro->modelo}}</p>
  </div>

  <div class="col-sm-2">
    <p>Preço - {{$carro->preco}}</p>
  </div>

  <div class="col-sm-2">
    <p>Cor - {{$carro->cor}}</p>
  </div>

  <div class="col-sm-2">
    <p>Ano - {{$carro->ano}}</p>
  </div>

  <div class="col-sm-2">
    <p>Combustível - {{$carro->combustivel}}</p>
  </div>
  <br>
</div>

  <form method="POST" action="{{ url('propostas') }}">    
    {{ csrf_field() }}
    <div class="col-sm-12">
      <br>
      <input class="form-control" name="id_veiculo" 
      type="hidden" value="{{$carro->id}}"
      style="width: 35px; height: 35px;">
      <br>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" class="form-control" id="email" name="email"
        placeholder="nome@exemplo.com">
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome"
              placeholder="Nome">
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
          <label for="telefone">Telefone</label><br>
          <input type="text" class="input-medium bfh-phone" data-format="+1 (ddd) ddd-dddd"
          id="telefone" name="telefone">
        </div>
    </div>
    <div class="col-sm-5">
      <div class="form-group">
        <label for="propostatext">Sua proposta</label>
        <textarea class="form-control" rows="3"
        id="descricao_proposta" name="descricao_proposta"></textarea>
      </div>
    </div>
  
  <div class="col-sm-12">
    <button type="submit" class="btn btn-primary">Enviar</button>
  </div>
  </form>
@endsection