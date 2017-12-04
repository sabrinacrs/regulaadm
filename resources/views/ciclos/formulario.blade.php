@if(Auth::check())
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <!-- FORMULÁRIO -->
      <div class="panel panel-default noborder">

        {{-- panel  header --}}
        <div class="panel-heading">
          <h2>NOVO CICLO</h2>
          <h4>Adicionar novo ciclo à base de dados</h4>
        </div>

        {{--  body panel --}}
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
            {!! Form::submit('Alterar', ['class'=>'btn btn-primary', 'style'=>'display:inline; width: 33%']) !!}
          @else
            {!! Form::submit('Salvar', ['class'=>'btn btn-success', 'style'=>'display:inline; width: 33%']) !!}
          @endif
          {{ Form::reset('Cancelar', ['class' => 'btn btn-default', 'style'=>'display:inline; width: 33%']) }}

          {!! Form::close() !!}
        </div>

        {{--  footer  --}}
        <div class="panel-footer">
        </div>
      </div>
    </div>
  </div>
@endif