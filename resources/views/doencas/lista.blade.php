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
                      <h3>NOVA DOENÇA</h3>
                      Adicionar nova doença
                    @else
                      <h3>ALTERAR DOENÇA</h3>
                      Alterar doença selecionada
                    @endif
                    <a href="{{ url('doencas/lista') }}" class="btn btn-primary pull-right">Ocultar Formulário</a>
                  </div>
                </div>
              </div>

              {{--  panel body  --}}
              <div class="panel-body">
                @if(Request::is('*/nova'))
                  {!! Form::open(['url' => 'doencas/lista/salvar']) !!}
                @else
                  {!! Form::model($doenca, ['method'=>'PATCH', 'url'=>'doencas/lista/'.$doenca->id]) !!}
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
                  <a href="{{ url('doencas/lista/nova') }}" class="btn btn-default">Cancelar</a>
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

            {{--  panel heading  --}}
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-12">
                  <h3>LISTA DE DOENÇAS</h3>
                  Doenças registradas na base de dados

                  <!-- habilitar botão de nova doença -->
                  @if(!Request::is('*/nova'))
                  <a href="{{ url('doencas/lista/nova') }}" class="btn btn-success pull-right">
                    <span class="glyphicon glyphicon-plus"></span> Nova Doença
                  </a>
                  @endif

                </div>
              </div>
            </div>

            {{--  panel body  --}}
            <div class="panel-body">

              <!-- FORMULÁRIO DE BUSCA -->
              @if(!Request::is('*/nova') && !Request::is('*/editar'))
                {!! Form::open(['method' => 'post', 'url' => 'doencas/lista/buscar']) !!}  {{-- buscar/'.$filtro] --}}
                {!! Form::label('descricao', 'Filtrar Doença') !!}
                <div class="input-group">
                    {!! Form::input('text', 'buscar', null, ['class'=>'form-control', 'autofocus']) !!}
                    <span class="input-group-btn">
                    {!! Form::submit('Pesquisar', ['class' => 'btn btn-success']) !!}
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
                  @foreach ($doencas as $doenca)
                    <tr>
                      <td class="text-left">{{ $doenca->descricao }}</td>
                      <td class="text-right">
                        <a href="{{ action('DoencasController@detailsDoenca', $doenca->id) }}" class="btn btn-warning">Visualizar</a>
                        <a href="{{ action('DoencasController@editar', $doenca->id) }}" class="btn btn-primary">Editar</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confimar-exclusa-{{ $doenca->id }}">Excluir</button>

                        <!-- MODAL -->
                        <div id="confimar-exclusa-{{ $doenca->id }}" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirmar Exclusão</h4>
                              </div>
                              <div class="modal-body">
                                <p>Confirma a exclusão da doença {{ strtoupper($doenca->descricao) }}?</p>
                              </div>
                              <div class="modal-footer">
                                {!! Form::open(['method'=> 'POST', 'url' => 'doencas/'.$doenca->id.'/excluir', 'style' => 'display: inline;']) !!}
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

