<!-- Lista as cultivares -->
@extends('layouts.app')

@section('content')

  <div class="container container-content">

  <!-- FORMULÁRIO PARA ALTERAÇÃO E INSERÇÃO -->


  <!-- LISTA DE CULTIVARES -->
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default noborder">
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
                <thead>
                  <tr>
                    <th class="text-left">NOME</th>
                    <th style="padding-left: 63%">AÇÕES</th>
                  </tr>
                </thead>
                <tbody class="">
                  @foreach ($cultivares as $cultivar)
                    <tr>
                      <td class="text-left">{{ $cultivar->nome }}</td>
                      <td class="text-right">
                        <a href="" class="btn btn-warning">Visualizar</a>
                        <a href="{{ action('CultivaresController@editar', $cultivar->id) }}" class="btn btn-primary">Editar</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confimar-exclusao-{{ $cultivar->id }}">Excluir</button>

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
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection
