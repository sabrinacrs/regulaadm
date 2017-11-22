@extends('layouts.app')

@if(Auth::check())
  @section('content')
    <div class="container container-content">

      @include('epocas_semeadura.formulario')

      <!-- BUSCA -->
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default noborder nopadding">

            <div class="panel-heading no-background">
              <h2>PESQUISAR ÉPOCAS DE SEMEADURA</h2>
              <h4>Procurar dentre as épocas de semeadura cadastradas</h4>
            </div>

            <div class="panel-body">
              {!! Form::open(['method' => 'post', 'url' => 'epocas_semeadura/lista/buscar']) !!}
              {!! Form::label('descricao', 'Filtrar Época de Semeadura') !!}
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

@endif
