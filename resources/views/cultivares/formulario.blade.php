<!-- FORMULÁRIO -->
<div class="row">
      <div class="col-md-8 col-md-offset-3">
          <div class="panel panel-default noborder">

              <!-- cabeçalho painel formulário -->
              <div class="panel-heading">
                @if(Request::is('*/editar'))
                  <h3>ALTERAR CULTIVAR</h3>
                  Alterar ciclo selecionado
                @else
                  <h2>NOVA CULTIVAR</h2>
                  <h4>Adicionar nova cultivar à base de dados</h4>
                @endif
              </div>

              <!-- corpo painel com formulário -->
              <div class="panel-body">

                <!-- mensagem de feedback de operação -->
                @if(Session::has('mensagem_sucesso'))
                  <div class="alert alert-success">
                    {{ Session::get('mensagem_sucesso') }}
                  </div>
                @endif
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                <!-- FORMULÁRIO -->
                <!-- Conteúdo Lista Selects -->
                @php
                  $alturas = ['Alta'=>'Alta', 'Media'=>'Média', 'Baixa'=>'Baixa', 'BaixaMedia'=>'Baixa/Média', 'MediaAlta'=>'Média/Alta'];
                  $fertilidades = ['Alta'=>'Alta', 'Media'=>'Média', 'Baixa'=>'Baixa', 'BaixaMedia'=>'Baixa/Média', 'MediaAlta'=>'Média/Alta'];
                  $reguladores = ['Alta'=>'Alta', 'Media'=>'Média', 'Baixa'=>'Baixa', 'BaixaMedia'=>'Baixa/Média', 'MediaAlta'=>'Média/Alta'];

                  $alturaSelected = null;
                  $fertilidadeSelected = null;
                  $reguladorSelected = null;
                  $cicloSelected = null;

                  if(Request::is('*/editar'))
                  {
                      $cicloSelected = $cultivar->cic_id;
                      $alturaSelected = $cultivar->altura_planta;
                      $fertilidadeSelected = $cultivar->fertilidade;
                      $reguladorSelected = $cultivar->regulador;
                  }
                @endphp

                <!-- abrir formulário -->
                @if(Request::is('*/editar'))
                  {!! Form::model($cultivar, ['method'=>'PATCH', 'url'=>'cultivares/'.$cultivar->id]) !!}
                @else
                  {!! Form::open(['url' => 'cultivares/salvar']) !!}
                  {!! Form::hidden('status', 'A') !!}
                @endif
                {{ csrf_field() }}

                <!-- inputs -->
                <!-- Primeira linha do Formulário -->
                <div class="form-inline">
                  <div class="form-group">
                    {!! Form::label('nome', 'Nome') !!}<br />
                    {!! Form::input('text', 'nome', null, ['style' => 'width: 500px; margin-right: 20px;', 'class'=>'form-control', 'required']) !!}
                  </div>

                  <div class="form-group">
                    {!! Form::label('ciclo', 'Ciclo') !!}<br />
                    {{ Form::select('selectCiclo', $ciclos, $cicloSelected, array('style' => 'width: 300px;', 'class' => 'form-control')) }}
                  </div>
                </div>
                <br />

                <!-- Segunda linha do Formulário -->
                <div class="form-inline">
                  <div class="form-group">
                    {!! Form::label('altura', 'Altura da Planta') !!}<br />
                    {{ Form::select('selectAltura', $alturas, $alturaSelected, array('style' => 'width: 260px; margin-right: 20px;', 'class' => 'form-control')) }}
                  </div>

                  <div class="form-group">
                    {!! Form::label('fertilidade', 'Exigência em Fertilidade') !!}<br />
                    {{ Form::select('selectFertilidade', $fertilidades, $fertilidadeSelected, array('style' => 'width: 260px; margin-right: 20px;', 'class' => 'form-control')) }}
                  </div>

                  <div class="form-group">
                    {!! Form::label('regulador', 'Exigência em Regulador') !!}<br />
                    {{ Form::select('selectRegulador', $reguladores, $reguladorSelected, array('style' => 'width: 260px; margin-right: 20px;', 'class' => 'form-control')) }}
                  </div>
                </div>
                <br />

                <!-- Terceira linha do Formulário -->
                <div class="form-inline">
                  <div class="form-group">
                    {!! Form::label('rendimento_fibra', 'Rendimento da Fibra (%)') !!}<br />
                    {!! Form::label('rendimento_fibra_minimo', 'Min.') !!}

                    <div class="form-group{{ $errors->has('rendimento_fibra_minimo') ? ' has-error' : '' }}">
                      {!! Form::input('text', 'rendimento_fibra_minimo', null, ['placeholder'=>'0,00', 'style' => 'width: 86px; margin-right: 20px;', 'class'=>'form-control myNumber', 'required']) !!}
                      @if ($errors->has('rendimento_fibra_minimo'))
                          <span class="help-block">
                              <strong>{{ $errors->first('rendimento_fibra_minimo') }}</strong>
                          </span>
                      @endif
                    </div>

                    {{-- {!! Form::input('text', 'rendimento_fibra_minimo', null, ['placeholder'=>'0,00', 'style' => 'width: 86px; margin-right: 20px;', 'class'=>'form-control myNumber', 'required']) !!} --}}
                    {!! Form::label('rendimento_fibra_maximo', 'Max.') !!}
                    {!! Form::input('text', 'rendimento_fibra_maximo', null, ['placeholder'=>'0,00', 'style' => 'width: 86px; margin-right: 20px;', 'class'=>'form-control myNumber', 'required']) !!}
                  </div>

                  <div class="form-group">
                    {!! Form::label('peso_capulho', 'Peso Médio do Capulho (g)') !!}<br />
                    {!! Form::label('peso_capulho_minimo', 'Min.') !!}
                    {!! Form::input('text', 'peso_capulho_minimo', null, ['placeholder'=>'0,00', 'style' => 'width: 86px; margin-right: 20px;', 'class'=>'form-control myNumber', 'required']) !!}
                    {!! Form::label('peso_capulho_maximo', 'Max.') !!}
                    {!! Form::input('text', 'peso_capulho_maximo', null, ['placeholder'=>'0,00', 'style' => 'width: 86px; margin-right: 20px;', 'class'=>'form-control myNumber', 'required']) !!}
                  </div>

                  <div class="form-group">
                    {!! Form::label('comprimento_fibra', 'Comprimento da Fibra (mm)') !!}<br />
                    {!! Form::label('comprimento_fibra_minimo', 'Min.') !!}
                    {!! Form::input('text', 'comprimento_fibra_minimo', null, ['placeholder'=>'0,00', 'style' => 'width: 86px; margin-right: 20px;', 'class'=>'form-control myNumber', 'required']) !!}
                    {!! Form::label('comprimento_fibra_maximo', 'Max.') !!}
                    {!! Form::input('text', 'comprimento_fibra_maximo', null, ['placeholder'=>'0,00', 'style' => 'width: 86px; margin-right: 20px;', 'class'=>'form-control myNumber', 'required']) !!}
                  </div>
                </div>
                <br />

                <!-- Quarta linha do Formulário -->
                <div class="form-inline">
                  <div class="form-group">
                    {!! Form::label('micronaire', 'Micronaire') !!}<br />
                    {!! Form::label('micronaire_minimo', 'Min.') !!}
                    {!! Form::input('text', 'micronaire_minimo', null, ['placeholder'=>'0,00', 'style' => 'width: 86px; margin-right: 20px;', 'class'=>'form-control myNumber', 'required']) !!}
                    {!! Form::label('micronaire_maximo', 'Max.') !!}
                    {!! Form::input('text', 'micronaire_maximo', null, ['placeholder'=>'0,00', 'style' => 'width: 86px; margin-right: 20px;', 'class'=>'form-control myNumber', 'required']) !!}
                  </div>

                  <div class="form-group">
                    {!! Form::label('resistencia', 'Resistência') !!}<br />
                    {!! Form::label('resistencia_minimo', 'Min.') !!}
                    {!! Form::input('text', 'resistencia_minimo', null, ['placeholder'=>'0,00', 'style' => 'width: 86px; margin-right: 20px;', 'class'=>'form-control myNumber', 'required']) !!}
                    {!! Form::label('resistencia_maximo', 'Max.') !!}
                    {!! Form::input('text', 'resistencia_maximo', null, ['placeholder'=>'0,00', 'style' => 'width: 86px; margin-right: 20px;', 'class'=>'form-control myNumber', 'required']) !!}
                  </div>

                  <div class="form-group">
                    {!! Form::label('peso_sementes_minimo', 'Peso de 100 sementes') !!}<br />
                    {!! Form::label('peso_sementes_minimo', 'Min.') !!}
                    {!! Form::input('text', 'peso_sementes_minimo', null, ['placeholder'=>'0,00', 'style' => 'width: 86px; margin-right: 20px;', 'class'=>'form-control myNumber', 'required']) !!}
                    {!! Form::label('peso_sementes_maximo', 'Max.') !!}
                    {!! Form::input('text', 'peso_sementes_maximo', null, ['placeholder'=>'0,00', 'style' => 'width: 86px; margin-right: 20px;', 'class'=>'form-control myNumber', 'required']) !!}
                  </div>
                </div>
                <br />

                <!-- Quinta linha do Formulário -->
                <div class="form-inline">
                  <div class="form-group">
                    {!! Form::label('cultivar_epoca_semeadura', 'Número de Plantas/ha de acordo com a época de semeadura') !!}<br />
                    @foreach($epocasSemeadura as $epocaSemeadura => $value)
                      {!! Form::label('epocaSemeadura', $value) !!}
                      @if(Request::is('*/editar'))
                        @php
                          $plantas_ha = 0;
                          $i = 0;
                          $achou = false;

                          while($i < sizeof($cultivaresHasEpocaSemeadura) && !$achou)
                          {
                              $cult = $cultivaresHasEpocaSemeadura[$i];
                              //echo intval($epocaSemeadura);
                              if($cult->ep_id == $epocaSemeadura)
                              {
                                  $plantas_ha = $cult->plantas_ha;
                                  $achou = true;
                              }

                              $i++;
                          }
                        @endphp
                        {!! Form::text(str_replace(' ', '', $value), $plantas_ha, ['placeholder'=>'0,00', 'style' => 'width: 86px; margin-right: 20px;', 'class'=>'form-control myNumber', 'required']) !!}
                      @else
                        {!! Form::input('text', str_replace(' ', '', $value), null, ['placeholder'=>'0,00', 'style' => 'width: 86px; margin-right: 20px;', 'class'=>'form-control myNumber', 'required']) !!}
                      @endif
                    @endforeach
                  </div>
                </div>
                <br />

                <div lass="form-inline">
                  <!-- submits -->
                  @if(Request::is('*/editar'))
                    {!! Form::submit('Alterar', ['class'=>'btn btn-primary', 'style'=>'display:inline;']) !!}
                    <a class="btn btn-default" href="{{ url('cultivares/lista') }}">Cancelar</a>
                    <a class="btn btn-success pull-right" href="{{ url('cultivares/doencas', ['cultivarId'=>$cultivar->id]) }}">Vincular Doenças</a>
                  @else
                    {!! Form::submit('Salvar', ['class'=>'btn btn-success', 'style'=>'display:inline;']) !!}
                    {{ Form::reset('Cancelar', ['class' => 'btn btn-default']) }}
                  @endif
                  <!-- Fechar Formulário -->
                  {!! Form::close() !!}
                </div>
            </div>

              <!-- FOOTER -->
              <div class="panel-footer">
              </div>
          </div>
        </div>
</div>
