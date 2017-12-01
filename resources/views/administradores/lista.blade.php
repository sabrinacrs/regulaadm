@extends('layouts.app')

@section('content')
  <div class="container container-content">

    <!-- FORMULÁRIO PARA ALTERAÇÃO E INSERÇÃO -->

    <!-- LISTA DE DOENÇAS -->
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default noborder">

          {{--  panel header  --}}
          <div class="panel-heading">
            <div class="row">
              <div class="col-md-12">
                <h3>LISTA DE ADMINISTRADORES</h3>
                Administradores registrados na base de dados
              </div>
            </div>
          </div>

          {{--  panel body  --}}
          <div class="panel-body">
            <!-- FORMULÁRIO DE BUSCA -->
            @if(!Request::is('*/novo') && !Request::is('*/editar'))
              {!! Form::open(['method' => 'post', 'url' => 'administradores/lista/buscar']) !!}  {{-- buscar/'.$filtro] --}}
              {!! Form::label('descricao', 'Filtrar Administrador') !!}
              <div class="input-group">
                {!! Form::input('text', 'buscar', null, ['class'=>'form-control', 'autofocus']) !!}
                <span class="input-group-btn">
                  {!! Form::submit('Pesquisar', ['class' => 'btn btn-success']) !!}
                  {{-- <a class="btn btn-default" href="{{ url('doencas') }}">Cancelar</a> --}}
                </span>
            </div>
              {!! Form::close() !!}
              <br />

              {{--  mensagem sucesso  --}}
              @if(Session::has('mensagem_sucesso') && !Request::is('*/novo') && !Request::is('*/editar'))
                <div class="alert alert-success">
                  {{ Session::get('mensagem_sucesso') }}
                </div>
              @endif
            @endif

            {{--  tabela de resultados  --}}
            <table class="table table-hover table-striped" data-toggle="dataTable">
              <thead>
                <tr>
                  <th class="text-left">DESCRIÇÃO</th>
                  <th style="padding-left: 63%">AÇÕES</th>
                </tr>
              </thead>
              <tbody class="">
                @foreach ($administradores as $administrador)
                  <tr>
                    <td class="text-left">{{ $administrador->name }}</td>
                    <td class="text-right">
                      <a href="" class="btn btn-warning">Visualizar</a>
                      {{--  <a href="{{ action('AdministadoresController@editar', $administrador->id) }}" class="btn btn-primary">Editar</a>  --}}
                      
                      @if(is_null($administrador->status) || $administrador->status == 'A')
                          <a href="{{ action('AdministradoresController@disableEnableAdministrador', $administrador->id) }}" class="btn btn-warning">Desativar</a>
                        @else
                          <a href="{{ action('AdministradoresController@disableEnableAdministrador', $administrador->id) }}" class="btn btn-success">Ativar</a>
                        @endif

                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confimar-exclusao-{{ $administrador->id }}">Excluir</button>

                      <!-- MODAL -->
                      <div id="confimar-exclusao-{{ $administrador->id }}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Confirmar Exclusão</h4>
                            </div>
                            <div class="modal-body">
                              <p>Confirma a exclusão do administrador {{ strtoupper($administrador->name) }}?</p>
                            </div>
                            <div class="modal-footer">
                              {!! Form::open(['method'=> 'POST', 'url' => 'administradores/'.$administrador->id.'/excluir', 'style' => 'display: inline;']) !!}
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
