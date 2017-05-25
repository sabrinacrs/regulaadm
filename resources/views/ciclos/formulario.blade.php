
<div class="row">
      <div class="col-md-8 col-md-offset-2">

        <!-- FORMULÁRIO -->
          <div class="panel panel-default noborder">
              <div class="panel-heading">
                <h2>NOVO CICLO</h2>
                <h4>Adicionar novo ciclo à base de dados</h4>
              </div>
              <div class="panel-body">
                @if(Session::has('mensagem_sucesso'))
                  <div class="alert alert-success">
                    {{ Session::get('mensagem_sucesso') }}
                  </div>
                @endif

                @if(Request::is('*/editar'))
                  {!! Form::model($ciclo, ['method'=>'PATCH', 'url'=>'ciclos/'.$ciclo->id]) !!}
                @else
                  {!! Form::open(['url' => 'ciclos/salvar']) !!}
                @endif

                {!! Form::label('descricao', 'Descrição') !!}
                {!! Form::input('text', 'descricao', null, ['class'=>'form-control', 'required']) !!}

                <br />
                @if(Request::is('*/editar'))
                  {!! Form::submit('Alterar', ['class'=>'btn btn-primary', 'style'=>'display:inline;']) !!}
                @else
                  {!! Form::submit('Salvar', ['class'=>'btn btn-success', 'style'=>'display:inline;']) !!}
                @endif
                {{ Form::reset('Cancelar', ['class' => 'btn btn-default']) }}

                {!! Form::close() !!}
              </div>
              <div class="panel-footer">
              </div>
          </div>
        </div>

</div>
    {{-- @include('doencas.lista') --}}
