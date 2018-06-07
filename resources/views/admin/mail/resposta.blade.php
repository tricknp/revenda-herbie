@extends('adminlte::page')

@section('title', 'Responder E-mail')

@section('content_header')

  <a href="{{ route('carros.index') }}" class="btn btn-primary pull-right" role="button">Voltar</a>
</h2>

@endsection

@section('content')

<div class="row">
<form action="{{route ('enviarEmail')}}" method="post">
    {{ csrf_field() }}
    <div class="col-sm-12">
      <div class="form-group">
        <label for="para">E-mail Cliente:</label>
        <input type="text" id="email" name="email"
               value="{{$proposta->email or old('email')}}"
               class="form-control">
      </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
          <label for="assunto">Assunto:</label>
          <input type="text" id="assunto" name="assunto" class="form-control">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
          <label for="descricao">Descrição:</label>
          <textarea type="text" id="descricao" name="descricao" class="form-control"></textarea>
        </div>
    </div>

    <div class="col-sm-4">
    <br>
        <input type="submit" value="Enviar" class="btn btn-success">
        <input type="reset" value="Limpar" class="btn btn-warning">
    </div>
</form>

@endsection
