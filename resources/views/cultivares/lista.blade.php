<!-- Lista as cultivares -->
@extends('layouts.app')

@if(Auth::check())
  @section('content')

    <div class="container container-content">

      <!-- LISTA DE CULTIVARES -->
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default noborder">

            {{--  panel header  --}}
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-12">
                  <h3>LISTA DE CULTIVARES</h3>
                  Cultivares registradas na base de dados

                  <!-- habilitar botão de nova cultivar -->
                  @if(!Request::is('*/nova'))
                  <a href="{{ url('cultivares/nova') }}" class="btn btn-success pull-right">
                    <span class="glyphicon glyphicon-plus"></span> Nova Cultivar
                  </a>
                  @endif

                  <br /><br /><br />
                  @if(Session::has('mensagem_sucesso'))
                    <div class="alert alert-success">
                      {{ Session::get('mensagem_sucesso') }}
                    </div>
                  @endif

                </div>
              </div>
            </div>

            {{--  panel body  --}}
            <div class="panel-body">
              <!-- FORMULÁRIO DE BUSCA -->
              {!! Form::open(['method' => 'post', 'url' => 'cultivares/lista/buscar']) !!}  {{-- buscar/'.$filtro] --}}
              {!! Form::label('descricao', 'Filtrar Cultivar') !!}
              <div class="input-group">
                {!! Form::input('text', 'buscar', null, ['class'=>'form-control', 'autofocus']) !!}
                <span class="input-group-btn">
                  {!! Form::submit('Pesquisar', ['class' => 'btn btn-success']) !!}
                  {{-- <a class="btn btn-default" href="{{ url('doencas') }}">Cancelar</a> --}}
                </span>
              </div>
              {!! Form::close() !!}

              <br />
              <table class="table table-hover table-striped" data-toggle="dataTable">
                {{-- header table --}}
                <thead>
                  <tr>
                    <th class="text-left">ID</th>
                    <th class="text-left">NOME</th>
                    <th style="padding-left: 63%">AÇÕES</th>
                  </tr>
                </thead>

                {{-- body table --}}
                <tbody class="">
                  @foreach ($cultivares as $cultivar)
                    <tr>
                      <td class="text-left">{{ $cultivar->id }}</td>
                      <td class="text-left">{{ $cultivar->nome }}</td>
                      <td class="text-right">
                        <table align="right">
                          <tr style="width: 100%">
                            {{--  coluna Visualizar  --}}
                            <td style="width: 15%">
                              <a style="width: 100%" href="{{ action('CultivaresController@detailsCultivar', $cultivar->id) }}" class="btn btn-primary">Visualizar</a>
                            </td>

                            {{--  coluna editar  --}}
                            <td style="width: 15%">
                              <a style="width: 100%" href="{{ action('CultivaresController@editar', $cultivar->id) }}" class="btn btn-default">Editar</a>
                            </td>

                            {{--  coluna enable disable  --}}
                            <td style="width: 15%">
                              @if(is_null($cultivar->status) || $cultivar->status == 'A' || $cultivar->status == '')
                                <a style="width: 100%" href="{{ action('CultivaresController@disableEnableCultivar', $cultivar->id) }}" class="btn btn-warning">Desativar</a>
                              @else
                                <a style="width: 100%" href="{{ action('CultivaresController@disableEnableCultivar', $cultivar->id) }}" class="btn btn-success">Ativar</a>
                              @endif
                            </td>

                            {{--  coluna excluir  --}}
                            <td style="width: 15%">
                              <button style="width: 100%" type="button" class="btn btn-danger" data-toggle="modal" data-target="#confimar-exclusao-{{ $cultivar->id }}">Excluir</button>
                            </td>
                          </tr>
                        </table>

                        <!-- MODAL -->
                        <div id="confimar-exclusao-{{ $cultivar->id }}" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirmar Exclusão</h4>
                              </div>
                              <div class="modal-body">
                                <p>Confirma a exclusão da Cultivar: {{ strtoupper($cultivar->nome) }}?</p>
                              </div>
                              <div class="modal-footer">
                                {!! Form::open(['method'=> 'POST', 'url' => 'cultivares/'.$cultivar->id.'/excluir', 'style' => 'display: inline;']) !!}
                                {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>

                {{-- footer table --}}
                <tfoot>
                  <tr>
                    <th colspan='10' class="text-center">{{ $links }}</th> 
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
@endif


