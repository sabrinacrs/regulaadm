@if(Auth::check())
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <!-- FORMULÁRIO -->
      <div class="panel panel-default noborder">
        {{--  panel header  --}}
        <div class="panel-heading">
          <h2>NOVA DOENÇA</h2>
          <h4>Adicionar nova doença à base de dados</h4>
        </div>

        {{--  panel body  --}}
        <div class="panel-body">
          @if(Session::has('mensagem_sucesso'))
            <div class="alert alert-success">
              {{ Session::get('mensagem_sucesso') }}
            </div>
          @endif

          @if(Request::is('*/editar'))
            {!! Form::model($doenca, ['method'=>'PATCH', 'url'=>'doencas/'.$doenca->id]) !!}
          @else
            {!! Form::open(['url' => 'doencas/salvar']) !!}
          @endif

          {!! Form::label('descricao', 'Descrição') !!}
          {!! Form::input('text', 'descricao', null, ['class'=>'form-control', 'required']) !!}

          <br />
          @if(Request::is('*/editar'))
            {!! Form::submit('Alterar', ['class'=>'btn btn-primary', 'style'=>'display:inline; width:33%']) !!}
          @else
            {!! Form::submit('Salvar', ['class'=>'btn btn-success', 'style'=>'display:inline; width:33%']) !!}
          @endif
          {{ Form::reset('Cancelar', ['class' => 'btn btn-default', 'style'=>'display:inline; width:33%']) }}

          {!! Form::close() !!}
        </div>

        {{--  panel footer  --}}
        <div class="panel-footer">
        </div>
      </div>
    </div>
  </div>
@endif

