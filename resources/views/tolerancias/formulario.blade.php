@if(Auth::check())
  <div class="row">
  <div class="col-md-8 col-md-offset-2">

    <!-- FORMULÁRIO -->
    <div class="panel panel-default noborder">

      {{--  panel body  --}}
      <div class="panel-heading">
        <h2>NOVA TOLERÂNCIA</h2>
        <h4>Adicionar nova tolerância à base de dados</h4>
      </div>

      {{--  panel body  --}}
      <div class="panel-body">
        @if(Session::has('mensagem_sucesso'))
          <div class="alert alert-success">
            {{ Session::get('mensagem_sucesso') }}
          </div>
        @endif

        @if(Request::is('*/editar'))
          {!! Form::model($tolerancia, ['method'=>'PATCH', 'url'=>'tolerancias/'.$tolerancia->id]) !!}
        @else
          {!! Form::open(['url' => 'tolerancias/salvar']) !!}
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
        <div class="col-sm-6">
          @if(Request::is('*/editar'))
            {!! Form::submit('Alterar', ['class'=>'btn btn-primary', 'style'=>'display:inline; width: 33%' ]) !!}
          @else
            {!! Form::submit('Salvar', ['class'=>'btn btn-success', 'style'=>'display:inline; width: 33%']) !!}
          @endif
          {{ Form::reset('Cancelar', ['class' => 'btn btn-default', 'style'=>'display:inline; width:33%']) }}
        </div>

        {!! Form::close() !!}

      </div>
      
      {{--  panel footer  --}}
      <div class="panel-footer">
      </div>
    </div>
  </div>
</div>
@endif
