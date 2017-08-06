<!-- carregar uma tabela com as doencas -->
<div class="row">
  <div class="col-md-8 col-md-offset-3">
      <div class="panel panel-default noborder">
        <div class="panel-heading">
          <h3>DOENÇAS</h3>
          Selecione o nível de tolerância para cada uma das doenças a seguir
        </div>
        <div class="panel-body">
          <table class="table table-striped" data-toggle="dataTable">
            <thead>
              <tr>
                <th class="text-left">DESCRIÇÃO</th>
                <th style="padding-left: 20%">
                  <div>
                    <label>TOLERÂNCIA</label>
                    <div style="margin-left: 30%">
                      {!! Form::open(['url' => 'cultivares/salvarTodoVinculoCultivarDoencaTolerancia']) !!}
                      {!! Form::submit('Confirmar Vínculos', ['class'=>'btn btn-success']) !!}
                      {!! Form::close() !!}
                    </div>{{-- <div class="btn btn-success" style="margin-left: 30%">Confirmar Vínculos</div> --}}
                  </div>
                </th>

              </tr>
            </thead>
            <tbody>
              @if(Request::is('*/editar'))
                  @php
                    $cultivarEdit = $cultivar->id;
                  @endphp
                  @foreach ($doencas as $doenca)
                    <tr>
                      <td class="text-left">{{ $doenca->descricao }}</td>
                      <td style="padding-left: 20%">
                        {!! Form::open(['url' => 'cultivares/salvarVinculoCultivarDoencaTolerancia']) !!}
                        {!! Form::hidden('doenca', $doenca) !!}
                        {!! Form::hidden('cultivar', $cultivar) !!}
                        @php
                          $toleranciaSelected = 0;
                          $pos = 0;
                          while($pos < sizeof($cultivarHasDoencas))
                          {
                              $teste = $cultivarHasDoencas[$pos];
                              if($teste->doe_id == $doenca->id)
                                $toleranciaSelected = $teste->tol_id;

                              $pos++;
                          }
                        @endphp
                        {{ Form::select('selectTolerancia', $tolerancias, $toleranciaSelected, array('style' => 'width: 260px; margin-right: 20px;', 'class' => 'form-control')) }}
                      </td>
                      <td>
                        {!! Form::submit('Vincular', ['class'=>'btn btn-success', 'style'=>'display:inline;']) !!}
                        <!-- Fechar Formulário -->
                        {!! Form::close() !!}
                      </td>
                    </tr>
                  @endforeach
              @else
                  @foreach ($doencas as $doenca)
                    <tr>
                      <td class="text-left">{{ $doenca->descricao }}</td>
                      <td style="padding-left: 20%">
                        {!! Form::open(['url' => 'cultivares/salvarVinculoCultivarDoencaTolerancia']) !!}
                        {!! Form::hidden('doenca', $doenca) !!}
                        {!! Form::hidden('cultivar', $cultivar) !!}
                        {{ Form::select('selectTolerancia', $tolerancias, null, array('style' => 'width: 260px; margin-right: 20px;', 'class' => 'form-control')) }}
                        {{-- @php
                          array_push($cultivaresDoencasTolerancias,
                                      'cultivar' => $cultivar->id,
                                      'doenca' => $doenca->id,
                                      'tolerancia' =>
                                    );
                        @endphp --}}
                      </td>
                      <td>
                        {!! Form::submit('Vincular', ['class'=>'btn btn-success', 'style'=>'display:inline;']) !!}
                        <!-- Fechar Formulário -->
                        {!! Form::close() !!}
                      </td>
                    </tr>
                  @endforeach
              @endif
            </tbody>
          </table>
        </div>
    </div>
  </div>
</div>
