@extends('layouts.app')

@if(Auth::check())
  @section('content')
    <div class="container container-content">
    
      <!-- BUSCA -->
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default noborder nopadding">
            {{--  panel header  --}}
            <div class="panel-heading no-background">
              <h2>LIBERAR ATUALIZAÇÕES</h2>
            </div>

            {{--  panel body  --}}
            <div class="panel-body">
                <p>Você realizou algumas modificações na base de dados. <br>
                    Para disponibilizá-las aos usuários do aplicativo, clique no botão abaixo. 
                </p>

                <a class="btn btn-success" href="{{ action('HistoricoAtualizacaoController@newRelease') }}">Disponibilizar Atualização</a>
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

