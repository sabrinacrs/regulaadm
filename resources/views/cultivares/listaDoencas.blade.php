@if(Auth::check())
  <!-- carregar uma tabela com as doencas -->
  <div class="row">
    <div class="col-md-8 col-md-offset-3">
      <div class="panel panel-default noborder">

        {{--  panel header  --}}
        <div class="panel-heading">
          <h3>DOENÇAS</h3>
          Selecione o nível de tolerância para cada uma das doenças a seguir
        </div>

        {{--  panel body  --}}
        <div class="panel-body">
          <table class="table table-striped" data-toggle="dataTable">
            {{--  table header  --}}
            <thead>
              <tr>
                <th class="text-left">DESCRIÇÃO</th>
                <th style="padding-left: 20%">
                  <div>
                    <label>TOLERÂNCIA</label>
                  </div>
                </th>
              </tr>
            </thead>

            {{--  table body  --}}
            <tbody>
              @if(Request::is('*/'.$cultivar->id))
                @foreach ($doencas as $doenca)
                  <tr id='{{ 'rowDoenca'.$doenca->id }}'>
                    <td class="text-left" id="{{ 'colDoenca'.$doenca->id }}">{{ $doenca->descricao }}</td>
                    <td style="padding-left: 20%">
                      {!! Form::open(['url' => 'cultivares/salvarTodoVinculoCultivarDoencaTolerancia']) !!}
                      {!! Form::hidden('doenca', $doenca) !!}
                      {!! Form::hidden('cultivar', $cultivar) !!}

                      {{-- Tabela de Tolerancias --}}
                      <table>
                        <tr>
                        @php
                          $quebraLinha = 0;
                        @endphp

                        {{-- Lista Tolerancias --}}
                        @foreach ($tolerancias as $tolerancia)
                          @php
                            $i = 0;
                            $achou = false;

                            // procurar posição da doenca no array cultivarhasdoencas
                            while(!$achou && $i < sizeof($cultivarHasDoencas))
                            {
                                $chd = $cultivarHasDoencas[$i];
                                if($chd->doe_id == $doenca->id && $chd->tol_id == $tolerancia->id)
                                  $achou = true;

                                $i++;
                            }
                          @endphp

                          {{-- Nova linha --}}
                          @php
                            if($quebraLinha == 2)
                            {
                              echo "</tr>";
                              echo "<tr>";
                              $quebraLinha = 0;
                            }
                            $quebraLinha++;
                          @endphp

                          {{-- Colunas Radio Buttons --}}
                          <td>
                            @if($achou){{-- && $i <= sizeof($cultivarHasDoencas) $tolerancia->id == $chd->tol_id && $doenca->id == $chd->doe_id --}}
                              {!! Form::radio('radio'.$doenca->id, $tolerancia->id, true, ['id'=>$tolerancia->id]) !!}
                            @else
                              {!! Form::radio('radio'.$doenca->id, $tolerancia->id, false, ['id'=>$tolerancia->id]) !!}
                            @endif
                            {!! Form::label($tolerancia->id, $tolerancia->descricao) !!}
                          </td>

                        @endforeach
                      </table>
                    </td>
                  </tr>
                @endforeach

              {{-- Nova Cultivar --}}
              @else
                {!! Form::open(['url' => 'cultivares/salvarTodoVinculoCultivarDoencaTolerancia']) !!}
                @foreach ($doencas as $doenca)
                  <tr id='{{ 'rowDoenca'.$doenca->id }}'>
                    <td class="text-left" id="{{ 'colDoenca'.$doenca->id }}">{{ $doenca->descricao }}</td>
                    <td style="padding-left: 20%">
                      {!! Form::hidden('doenca', $doenca) !!}
                      {!! Form::hidden('cultivar', $cultivar) !!}
                      @php
                        $doencaDescricao = strtolower(htmlentities($doenca->descricao));
                      @endphp

                      <!-- Coluna de tolerâncias -->
                      @foreach ($tolerancias as $tolerancia)
                        @php
                          $toleranciaDescricao = strtolower(htmlentities($tolerancia->descricao));
                        @endphp

                        <!-- Atribuir tolerancia a doenca com base na probabilidade -->
                        <!-- Nematoide das Galhas -->
                        @if (strcmp($doencaDescricao, 'nematoide das galhas') == 0 && strcmp($toleranciaDescricao, 'intolerante') == 0)
                          {!! Form::radio('radio'.$doenca->id, $tolerancia->id, true, ['id'=>$tolerancia->id]) !!}

                        <!-- Nematoide Reniforme -->
                        @elseif(strcmp($doencaDescricao, 'nematoide reniforme') == 0 && strcmp($toleranciaDescricao, 'moderadamente intolerante') == 0)
                          {!! Form::radio('radio'.$doenca->id, $tolerancia->id, true, ['id'=>$tolerancia->id]) !!}

                        <!-- Nematoide das lesões -->
                        @elseif(strcmp($doencaDescricao, htmlentities('nematoide das lesões')) == 0 && strcmp($toleranciaDescricao, htmlentities('sem informação')) == 0)
                          {!! Form::radio('radio'.$doenca->id, $tolerancia->id, true, ['id'=>$tolerancia->id]) !!}

                        <!-- Ramulária -->
                        @elseif(strcmp($doencaDescricao, htmlentities('ramulária')) == 0 && strcmp($toleranciaDescricao, htmlentities('susceptível')) == 0)
                          {!! Form::radio('radio'.$doenca->id, $tolerancia->id, true, ['id'=>$tolerancia->id]) !!}

                        <!-- Ramulose -->
                        @elseif(strcmp($doencaDescricao, 'ramulose') == 0 && strcmp($toleranciaDescricao, htmlentities('susceptível')) == 0)
                          {!! Form::radio('radio'.$doenca->id, $tolerancia->id, true, ['id'=>$tolerancia->id]) !!}

                        <!-- Doença Azul -->
                        @elseif(strcmp($doencaDescricao, htmlentities('doença azul')) == 0 && strcmp($toleranciaDescricao, 'resistente') == 0)
                          {!! Form::radio('radio'.$doenca->id, $tolerancia->id, true, ['id'=>$tolerancia->id]) !!}

                        <!-- Virose Atípica -->
                        @elseif(strcmp($doencaDescricao, htmlentities('virose atípica')) == 0 && strcmp($toleranciaDescricao, htmlentities('moderadamente susceptível')) == 0)
                          {!! Form::radio('radio'.$doenca->id, $tolerancia->id, true, ['id'=>$tolerancia->id]) !!}

                        <!-- Fusarium -->
                        @elseif(strcmp($doencaDescricao, 'fusarium') == 0 && strcmp($toleranciaDescricao, htmlentities('susceptível')) == 0)
                          {!! Form::radio('radio'.$doenca->id, $tolerancia->id, true, ['id'=>$tolerancia->id]) !!}

                        <!-- Mancha Angular -->
                        @elseif(strcmp($doencaDescricao, 'mancha angular') == 0 && strcmp($toleranciaDescricao, 'resistente') == 0)
                          {!! Form::radio('radio'.$doenca->id, $tolerancia->id, true, ['id'=>$tolerancia->id]) !!}

                        <!-- Complexo Apodrecimento -->
                        @elseif(strcmp($doencaDescricao, 'complexo apodrecimento') == 0 && strcmp($toleranciaDescricao, htmlentities('susceptível')) == 0)
                          {!! Form::radio('radio'.$doenca->id, $tolerancia->id, true, ['id'=>$tolerancia->id]) !!}

                        <!-- Default -->
                        @else
                          {!! Form::radio('radio'.$doenca->id, $tolerancia->id, false, ['id'=>$tolerancia->id]) !!}
                        @endif

                        <!-- Label com descricao da tolerancia -->
                        {!! Form::label($tolerancia->id, $tolerancia->descricao) !!}<br />
                      @endforeach
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>

          {!! Form::submit('Vincular', ['class'=>'btn btn-success', 'style'=>'display:inline;']) !!}
          {!! Form::close() !!}

        </div>
      </div>
    </div>
  </div>
@endif
