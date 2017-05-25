@extends('layouts.app')


@section('content')
<div class="container container-content">

<!-- Formulário p/ cadastrar novo Ciclo -->
@include('ciclos.formulario')

<!-- BUSCA -->
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default noborder nopadding">
        <div class="panel-heading no-background">
          <h2>PESQUISAR CICLOS</h2>
          <h4>Procurar dentre os ciclos cadastrados</h4>
        </div>
        <div class="panel-body">
          {!! Form::open(['method' => 'post', 'url' => 'ciclos/lista/buscar']) !!}
          {!! Form::label('descricao', 'Filtrar Ciclo') !!}
          <div class="input-group">
              {!! Form::input('text', 'buscar', null, ['class'=>'form-control']) !!}
              <span class="input-group-btn">
                {!! Form::submit('Pesquisar', ['class' => 'btn btn-success']) !!}
                {{-- <a class="btn btn-default" href="{{ url('doencas') }}">Cancelar</a> --}}
              </span>
              {!! Form::close() !!}
          </div>
        </div>
        <div class="panel-footer">

        </div>
      </div>
    </div>
  </div>
</div>

@endsection
