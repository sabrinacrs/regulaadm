@extends('layouts.app')

@if(Auth::check())
  @section('content')

  <div class="container container-content">

    <!-- FORMULÁRIO PARA ALTERAÇÃO E INSERÇÃO -->
    @if(Request::is('*/nova') || Request::is('*/editar'))
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default noborder">

            {{--  panel header  --}}
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-12">
                  @if(Request::is('*/nova'))
                    <h3>NOVA TOLERÂNCIA</h3>
                    Adicionar nova tolerância
                  @else
                    <h3>ALTERAR TOLERÂNCIA</h3>
                    Alterar tolerância selecionada
                  @endif
                  <a href="{{ url('tolerancias/lista') }}" class="btn btn-primary pull-right">Ocultar Formulário</a>
                </div>
              </div>
            </div>

            {{--  panel body  --}}
            <div class="panel-body">
              @if(Request::is('*/nova'))
                {!! Form::open(['url' => 'tolerancias/lista/salvar']) !!}
              @else
                {!! Form::model($tolerancia, ['method'=>'PATCH', 'url'=>'tolerancias/lista/'.$tolerancia->id.'/update']) !!}
              @endif

              <div class="form-inline">
                <div class="form-group col-md-6">
                  {!! Form::label('descricao', 'Descrição') !!} <br />
                  {!! Form::input('text', 'descricao', null, ['class'=>'form-control', 'required', 'style'=>'width: 100%']) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('sigla', 'Sigla') !!} <br />
                  {!! Form::input('text', 'sigla', null, ['class'=>'form-control', 'required', 'style'=>'width: 100%']) !!}
                </div>
              </div>

              <br />
              @if(Request::is('*/nova'))
                {!! Form::submit('Salvar', ['class'=>'btn btn-success', 'style'=>'display:inline; width:38%']) !!}
              @else
                {!! Form::submit('Alterar', ['class'=>'btn btn-primary', 'style'=>'display:inline; width:38%']) !!}
              @endif

              @if(Session::has('mensagem_sucesso') || Request::is('*/editar'))
                <a href="{{ url('tolerancias/lista/nova') }}" class="btn btn-default" style="width: 38%">Cancelar</a>
              @else
                {!! Form::reset('Cancelar', ['class' => 'btn btn-default', 'style'=>'display:inline; width:38%']) !!}
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

            {{--  panel header  --}}
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-12">
                  <h3>LISTA DE TOLERÂNCIAS</h3>
                  Tolerâncias registradas na base de dados

                  <!-- habilitar botão de nova doença -->
                  @if(!Request::is('*/nova'))
                  <a href="{{ url('tolerancias/lista/nova') }}" class="btn btn-success pull-right">
                    <span class="glyphicon glyphicon-plus"></span> Nova Tolerância
                  </a>
                  @endif

                </div>
              </div>
            </div>

            {{--  panel body  --}}
            <div class="panel-body">
              <!-- FORMULÁRIO DE BUSCA -->
              @if(!Request::is('*/nova') && !Request::is('*/editar'))
                {!! Form::open(['method' => 'post', 'url' => 'tolerancias/lista/buscar']) !!}  {{-- buscar/'.$filtro] --}}
                {!! Form::label('descricao', 'Filtrar Tolerância') !!}
                <div class="input-group">
                  {!! Form::input('text', 'buscar', null, ['class'=>'form-control', 'autofocus']) !!}
                  <span class="input-group-btn">
                    {!! Form::submit('Pesquisar', ['class' => 'btn btn-success']) !!}
                    {{-- <a class="btn btn-default" href="{{ url('doencas') }}">Cancelar</a> --}}
                  </span>
                </div>
                {!! Form::close() !!}

                <br />
                @if(Session::has('mensagem_sucesso') && !Request::is('*/nova') && !Request::is('*/editar'))
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
                  @foreach ($tolerancias as $tolerancia)
                    <tr>
                      <td class="text-left">{{ $tolerancia->descricao }}</td>
                      <td class="text-right" style="width: 60%">
                        <table align="right">
                          <tr style="width: 100%">
                            {{--  coluna vizualizar  --}}
                            <td style="width: 20%">
                              <a style="width: 100%" href="{{ action('ToleranciasController@detailsTolerancia', $tolerancia->id) }}" class="btn btn-primary">Visualizar</a>
                            </td>

                            {{--  Coluna Editar Doenca  --}}
                            <td style="width: 20%">
                              <a style="width: 100%" href="{{ action('ToleranciasController@editar', $tolerancia->id) }}" class="btn btn-default">Editar</a>
                            </td>

                            {{--  coluna desabilitar habilitar  --}}
                            <td style="width: 20%">
                              @if(is_null($tolerancia->status) || $tolerancia->status == 'A' || $tolerancia->status == '' )
                                <a style="width: 100%" href="{{ action('ToleranciasController@disableEnableTolerancia', $tolerancia->id) }}" class="btn btn-warning">Desativar</a>
                              @else
                                <a style="width: 100%" href="{{ action('ToleranciasController@disableEnableTolerancia', $tolerancia->id) }}" class="btn btn-success">Ativar</a>
                              @endif
                            </td>

                            {{--  coluna excluir  --}}
                            <td  style="width: 20%">
                              <button style="width: 100%" type="button" class="btn btn-danger" data-toggle="modal" data-target="#confimar-exclusao-{{ $tolerancia->id }}">Excluir</button>
                            </td>
                          </tr>
                        </table>

                        <!-- MODAL -->
                        <div id="confimar-exclusao-{{ $tolerancia->id }}" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirmar Exclusão</h4>
                              </div>
                              <div class="modal-body">
                                <p>Confirma a exclusão da tolerância {{ strtoupper($tolerancia->descricao) }}?</p>
                              </div>
                              <div class="modal-footer">
                                {!! Form::open(['method'=> 'POST', 'url' => 'tolerancias/'.$tolerancia->id.'/excluir', 'style' => 'display: inline;']) !!}
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
