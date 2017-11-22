@extends('layouts.app')

@if(Auth::check())
  @section('content')
    <div class="container container-content">

      @include('doencas.formulario')

      <!-- BUSCA -->
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default noborder nopadding">
            {{--  panel header  --}}
            <div class="panel-heading no-background">
              <h2>PESQUISAR DOENÇAS</h2>
              <h4>Procurar dentre as doenças cadastradas</h4>
            </div>

            {{--  panel body  --}}
            <div class="panel-body">
              {!! Form::open(['method' => 'post', 'url' => 'doencas/lista/buscar']) !!}
              {!! Form::label('descricao', 'Filtrar Doença') !!}
              <div class="input-group">
                {!! Form::input('text', 'buscar', null, ['class'=>'form-control']) !!}
                <span class="input-group-btn">
                  {!! Form::submit('Pesquisar', ['class' => 'btn btn-success']) !!}
                  {{-- <a class="btn btn-default" href="{{ url('doencas') }}">Cancelar</a> --}}
                </span>
                {!! Form::close() !!}
              </div>
            </div>

            {{--  panel footer  --}}
            <div class="panel-footer">
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
@endif

