@extends('layouts.app')

@if(Auth::check())
  @section('content')

    <div class="container container-content">
      <!-- LISTA DE CLIENTES -->
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default noborder">

            {{--  panel header  --}}
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-12">
                  <h3>LISTA DE CLIENTES</h3>
                  Clientes registrados na base de dados
                </div>
              </div>
            </div>

            {{--  panel body  --}}
            <div class="panel-body">

              <!-- FORMULÁRIO DE BUSCA -->
              {!! Form::open(['method' => 'post', 'url' => 'clientes/lista/search']) !!}  {{-- buscar/'.$filtro] --}}
              {!! Form::label('descricao', 'Procurar Cliente') !!}
              <div class="input-group">
                  {!! Form::input('text', 'filter', null, ['class'=>'form-control', 'autofocus']) !!}
                  <span class="input-group-btn">
                  {!! Form::submit('Pesquisar', ['class' => 'btn btn-success']) !!}
                  </span>
              </div>
              {!! Form::close() !!}

              {{--  message feedback  --}}
              <br />
              @if(Session::has('mensagem_sucesso'))
                <div class="alert alert-success">
                  {{ Session::get('mensagem_sucesso') }}
                </div>
              @endif

              <table class="table table-hover table-striped" data-toggle="dataTable">
                <thead>
                  <tr>
                    <th class="text-left">NOME</th>
                    <th class="text-left">E-MAIL</th>
                    <th style="">AÇÕES</th>
                  </tr>
                </thead>
                <tbody class="">
                  @foreach ($clientes as $cliente)
                    <tr>
                      <td class="text-left">{{ $cliente->nome }}</td>
                      <td class="text-left">{{ $cliente->email }}</td>
                      <td class="">
                        <table align="right">
                          <tr style="width: 100%">
                            {{--  coluna vizualizar  --}}
                            <td style="width: 30%">
                              <a style="width: 100%" href="{{ action('ClientesController@detailsCliente', $cliente->id) }}" class="btn btn-primary">Visualizar</a>
                            </td>

                            {{--  coluna desabilitar habilitar  --}}
                            <td style="width: 30%">
                              @if(is_null($cliente->status) || $cliente->status == 'A')
                                <a style="width: 100%" href="{{ action('ClientesController@disableEnableCliente', $cliente->id) }}" class="btn btn-warning">Desativar</a>
                              @else
                                <a style="width: 100%" href="{{ action('ClientesController@disableEnableCliente', $cliente->id) }}" class="btn btn-success">Ativar</a>
                              @endif
                            </td>

                            {{--  coluna excluir  --}}
                            <td  style="width: 30%">
                              <button style="width: 100%" type="button" class="btn btn-danger" data-toggle="modal" data-target="#confimar-exclusao-{{ $cliente->id }}">Excluir</button>
                            </td>
                          </tr>
                        </table>

                        <!-- MODAL -->
                        <div id="confimar-exclusao-{{ $cliente->id }}" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirmar Exclusão</h4>
                              </div>
                              <div class="modal-body">
                                <p>Esta ação apagará todos os registros do cliente. Confirma a exclusão do cliente {{ strtoupper($cliente->nome) }}?</p>
                              </div>
                              <div class="modal-footer">
                                {!! Form::open(['method'=> 'POST', 'url' => 'clientes/'.$cliente->id.'/excluir', 'style' => 'display: inline;']) !!}
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
