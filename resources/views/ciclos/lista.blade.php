@extends('layouts.app')

@if(Auth::check())
  @section('content')

  <div class="container container-content">

  <!-- FORMULÁRIO PARA ALTERAÇÃO E INSERÇÃO -->
  @if(Request::is('*/novo') || Request::is('*/editar'))
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default noborder">
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-12">
                  @if(Request::is('*/novo'))
                    <h3>NOVO CICLO</h3>
                    Adicionar novo ciclo
                  @else
                    <h3>ALTERAR CICLO</h3>
                    Alterar ciclo selecionado
                  @endif
                  <a href="{{ url('ciclos/lista') }}" class="btn btn-primary pull-right">Ocultar Formulário</a>
                </div>
              </div>
            </div>
            <div class="panel-body">
              @if(Request::is('*/novo'))
                {!! Form::open(['url' => 'ciclos/lista/salvar']) !!}
              @else
                {!! Form::model($ciclo, ['method'=>'PATCH', 'url'=>'ciclos/lista/'.$ciclo->id]) !!}
              @endif
                {!! Form::label('descricao', 'Descrição') !!}
                {!! Form::input('text', 'descricao', null, ['class'=>'form-control', 'required', 'autofocus']) !!}
              <br />
              @if(Request::is('*/novo'))
                {!! Form::submit('Salvar', ['class'=>'btn btn-success']) !!}
              @else
                {!! Form::submit('Alterar', ['class'=>'btn btn-primary']) !!}
              @endif

              @if(Session::has('mensagem_sucesso') || Request::is('*/editar'))
                <a href="{{ url('ciclos/lista/novo') }}" class="btn btn-default">Cancelar</a>
              @else
                {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
              @endif
                {!! Form::close() !!}
            </div>
            @if(Session::has('mensagem_sucesso'))
              <div class="alert alert-success">
                {{ Session::get('mensagem_sucesso') }}
              </div>
            @endif
        </div>
      </div>
    </div>
  @endif

  <!-- LISTA DE DOENÇAS -->
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default noborder">
          <div class="panel-heading">
            <div class="row">
              <div class="col-md-12">
                <h3>LISTA DE CICLOS</h3>
                Ciclos registrados na base de dados

                <!-- habilitar botão de nova doença -->
                @if(!Request::is('*/novo'))
                <a href="{{ url('ciclos/lista/novo') }}" class="btn btn-success pull-right">
                  <span class="glyphicon glyphicon-plus"></span> Novo Ciclo
                </a>
                @endif

              </div>
            </div>
          </div>
          <div class="panel-body">
            <!-- FORMULÁRIO DE BUSCA -->
            @if(!Request::is('*/novo') && !Request::is('*/editar'))
              {!! Form::open(['method' => 'post', 'url' => 'ciclos/lista/buscar']) !!}  {{-- buscar/'.$filtro] --}}
              {!! Form::label('descricao', 'Filtrar Ciclo') !!}
              <div class="input-group">
                  {!! Form::input('text', 'buscar', null, ['class'=>'form-control', 'autofocus']) !!}
                  <span class="input-group-btn">
                    {!! Form::submit('Pesquisar', ['class' => 'btn btn-success']) !!}
                    {{-- <a class="btn btn-default" href="{{ url('doencas') }}">Cancelar</a> --}}
                  </span>
              </div>
              {!! Form::close() !!}

              <br />
              @if(Session::has('mensagem_sucesso') && !Request::is('*/novo') && !Request::is('*/editar'))
                <div class="alert alert-success">
                  {{ Session::get('mensagem_sucesso') }}
                </div>
              @endif
            @endif
              <table class="table table-hover table-striped" data-toggle="dataTable">
                <thead>
                  <tr>
                    <th class="text-left">DESCRIÇÃO</th>
                    <th style="padding-left: 63%">AÇÕES</th>
                  </tr>
                </thead>
                <tbody class="">
                  @foreach ($ciclos as $ciclo)
                    <tr>
                      <td class="text-left">{{ $ciclo->descricao }}</td>
                      <td class="text-right">
                        <table align="right">
                          <tr style="width: 100%">
                            {{--  coluna visualizar  --}}
                            <td style="width: 30%">
                              <a style="width: 100%" href="{{ action('CiclosController@detailsCiclo', $ciclo->id) }}" class="btn btn-primary">Visualizar</a>
                            </td>

                            {{--  Coluna Editar Doenca  --}}
                            <td style="width: 30%">
                              <a style="width: 100%" href="{{ action('CiclosController@editar', $ciclo->id) }}" class="btn btn-default">Editar</a>
                            </td>

                            {{--  coluna desabilitar habilitar  --}}
                            <td style="width: 30%">
                              @if(is_null($ciclo->status) || $ciclo->status == 'A' || $ciclo->status == '' )
                                <a style="width: 100%" href="{{ action('CiclosController@disableEnableCiclo', $ciclo->id) }}" class="btn btn-warning">Desativar</a>
                              @else
                                <a style="width: 100%" href="{{ action('CiclosController@disableEnableCiclo', $ciclo->id) }}" class="btn btn-success">Ativar</a>
                              @endif
                            </td>

                            {{--  coluna excluir  --}}
                            <td style="width: 30%">
                              <button style="width: 100%" type="button" class="btn btn-danger" data-toggle="modal" data-target="#confimar-exclusao-{{ $ciclo->id }}">Excluir</button>
                            </td>
                          </tr>
                        </table>

                        <!-- MODAL -->
                        <div id="confimar-exclusao-{{ $ciclo->id }}" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirmar Exclusão</h4>
                              </div>
                              <div class="modal-body">
                                <p>Confirma a exclusão do ciclo {{ strtoupper($ciclo->descricao) }}?</p>
                              </div>
                              <div class="modal-footer">
                                {!! Form::open(['method'=> 'POST', 'url' => 'ciclos/'.$ciclo->id.'/excluir', 'style' => 'display: inline;']) !!}
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