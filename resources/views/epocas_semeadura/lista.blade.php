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
                      <h3>NOVA ÉPOCA DE SEMEADURA</h3>
                      Adicionar nova época de semeadura
                    @else
                      <h3>ALTERAR ÉPOCA DE SEMEADURA</h3>
                      Alterar época de semeadura selecionada
                    @endif
                    <a href="{{ url('epocas_semeadura/lista') }}" class="btn btn-primary pull-right">Ocultar Formulário</a>
                  </div>
                </div>
              </div>

              {{--  panel body  --}}
              <div class="panel-body">
                @if(Request::is('*/nova'))
                  {!! Form::open(['url' => 'epocas_semeadura/lista/salvar']) !!}
                @else
                  {!! Form::model($epoca_semeadura, ['method'=>'PATCH', 'url'=>'epocas_semeadura/lista/'.$epoca_semeadura->id. '/update']) !!}
                @endif
                  {!! Form::label('descricao', 'Descrição') !!}
                  {!! Form::input('text', 'descricao', null, ['class'=>'form-control', 'required', 'autofocus']) !!}
                <br />
                @if(Request::is('*/nova'))
                  {!! Form::submit('Salvar', ['class'=>'btn btn-success']) !!}
                @else
                  {!! Form::submit('Alterar', ['class'=>'btn btn-primary']) !!}
                @endif

                @if(Session::has('mensagem_sucesso') || Request::is('*/editar'))
                  <a href="{{ url('epocas_semeadura/lista/nova') }}" class="btn btn-default">Cancelar</a>
                @else
                  {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
                @endif
                  {!! Form::close() !!}
              </div>

              {{--  mensagem feedback  --}}
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
                  <h3>LISTA DE ÉPOCAS DE SEMEADURA</h3>
                  Épocas de Semeadura registradas na base de dados

                  <!-- habilitar botão de nova doença -->
                  @if(!Request::is('*/nova'))
                  <a href="{{ url('epocas_semeadura/lista/nova') }}" class="btn btn-success pull-right">
                    <span class="glyphicon glyphicon-plus"></span> Nova Época Semeadura
                  </a>
                  @endif

                </div>
              </div>
            </div>

            {{--  panel body  --}}
            <div class="panel-body">

              <!-- FORMULÁRIO DE BUSCA -->
              @if(!Request::is('*/nova') && !Request::is('*/editar'))
                {!! Form::open(['method' => 'post', 'url' => 'epocas_semeadura/lista/buscar']) !!}  {{-- buscar/'.$filtro] --}}
                {!! Form::label('descricao', 'Filtrar Época de Semeadura') !!}
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

              {{--  table  --}}
              <table class="table table-hover table-striped" data-toggle="dataTable">
                <thead>
                  <tr>
                    <th class="text-left">DESCRIÇÃO</th>
                    <th style="padding-left: 63%">AÇÕES</th>
                  </tr>
                </thead>
                <tbody class="">
                  @foreach ($epocas_semeadura as $epoca_semeadura)
                    <tr>
                      <td class="text-left">{{ $epoca_semeadura->descricao }}</td>
                      <td class="text-right">
                        <table align="right">
                          <tr style="width: 100%">
                            {{--  coluna visualizar  --}}
                            <td style="width: 20%">
                              <a style="width: 100%" href="{{ action('EpocasSemeaduraController@detailsEpocaSemeadura', $epoca_semeadura->id) }}" class="btn btn-primary">Visualizar</a>
                            </td>

                            {{--  Coluna Editar Doenca  --}}
                            <td style="width: 20%">
                              <a style="width: 100%" href="{{ action('EpocasSemeaduraController@editar', $epoca_semeadura->id) }}" class="btn btn-default">Editar</a>
                            </td>

                            {{--  coluna desabilitar habilitar  --}}
                            <td style="width: 20%">
                              @if(is_null($epoca_semeadura->status) || $epoca_semeadura->status == 'A' || $epoca_semeadura->status == '' )
                                <a style="width: 100%" href="{{ action('EpocasSemeaduraController@disableEnableEpocaSemeadura', $epoca_semeadura->id) }}" class="btn btn-warning">Desativar</a>
                              @else
                                <a style="width: 100%" href="{{ action('EpocasSemeaduraController@disableEnableEpocaSemeadura', $epoca_semeadura->id) }}" class="btn btn-success">Ativar</a>
                              @endif
                            </td>

                            {{--  coluna excluir  --}}
                            <td  style="width: 20%">
                              <button style="width: 100%" type="button" class="btn btn-danger" data-toggle="modal" data-target="#confimar-exclusao-{{ $epoca_semeadura->id }}">Excluir</button>
                            </td>
                          </tr>
                        </table>

                        <!-- MODAL -->
                        <div id="confimar-exclusao-{{ $epoca_semeadura->id }}" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirmar Exclusão</h4>
                              </div>

                              <div class="modal-body">
                                <p>Confirma a exclusão da época de semeadura {{ strtoupper($epoca_semeadura->descricao) }}?</p>
                              </div>

                              <div class="modal-footer">
                                {!! Form::open(['method'=> 'POST', 'url' => 'epocas_semeadura/'.$epoca_semeadura->id.'/excluir', 'style' => 'display: inline;']) !!}
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

