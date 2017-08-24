<div class="row">
      <div class="col-md-8 col-md-offset-2">

        <!-- FORMULÁRIO -->
          <div class="panel panel-default noborder">
              <div class="panel-heading">
                <h2>DADOS DA EMPRESA</h2>
                <h4>Preencha o formulário com dados da empresa para a parametrização</h4>
              </div>
              <div class="panel-body">
                @if(Session::has('mensagem_sucesso'))
                  <div class="alert alert-success">
                    {{ Session::get('mensagem_sucesso') }}
                  </div>
                @endif

                @if($empresa->id != -1)
                  {!! Form::model($empresa, ['method'=>'PATCH', 'url'=>'parametrizacao/'.$empresa->id.'/atualizar', 'enctype' => 'multipart/form-data']) !!}
                @else
                  {!! Form::open(['url' => 'parametrizacao/salvar', 'enctype' => 'multipart/form-data']) !!}
                @endif

                @php
                  $ufs = ['AC' => 'AC',
                          'AL' => 'AL',
                          'AP' => 'AP',
                          'AM' => 'AM',
                          'BA' => 'BA',
                          'CE' => 'CE',
                          'DF' => 'DF',
                          'ES' => 'ES',
                          'GO' => 'GO',
                          'MA' => 'MA',
                          'MT' => 'MT',
                          'MS' => 'MS',
                          'MG' => 'MG',
                          'PA' => 'PA',
                          'PB' => 'PB',
                          'PR' => 'PR',
                          'PE' => 'PE',
                          'PI' => 'PI',
                          'RJ' => 'RJ',
                          'RN' => 'RN',
                          'RS' => 'RS',
                          'RO' => 'RO',
                          'RR' => 'RR',
                          'SC' => 'SC',
                          'SP' => 'SP',
                          'SE' => 'SE',
                          'TO' => 'TO'];

                  $ufSelected = '';
                  if($empresa->id != -1)
                    $ufSelected = $empresa->uf;

                @endphp
                  <!-- inputs -->
                  <!-- Primeira linha do Formulário -->
                  <div class="form-inline">
                    <div class="form-group">
                      {!! Form::label('nome', 'Nome da Empresa') !!}
                      {!! Form::label('nome', '*', ['style'=>'color:red']) !!}
                      <br />
                      {!! Form::input('text', 'nome', null, ['style' => 'width: 300px; margin-right: 20px;', 'class'=>'form-control', 'required']) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label('razao_social', 'Razão Social') !!}
                      {!! Form::label('razao_social', '*', ['style'=>'color:red']) !!}
                      <br />
                      {!! Form::input('text', 'razao_social', null, ['style' => 'width: 300px; margin-right: 20px;', 'class'=>'form-control', 'required']) !!}
                    </div>
                  </div>
                  <br />

                  <!-- Segunda linha do Formulário -->
                  <div class="form-inline">
                    <div class="form-group">
                      {!! Form::label('ramo_atividade', 'Ramo Atividade') !!}
                      {!! Form::label('ramo_atividade', '*', ['style'=>'color:red']) !!}
                      <br />
                      {!! Form::input('text', 'ramo_atividade', null, ['style' => 'width: 300px; margin-right: 20px;', 'class'=>'form-control', 'required']) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label('cnpj', 'CNPJ') !!}
                      {!! Form::label('cnpj', '*', ['style'=>'color:red']) !!}
                      <br />
                      {!! Form::input('text', 'cnpj', null, ['style' => 'width: 200px; margin-right: 20px;', 'class'=>'form-control cnpj', 'required']) !!}
                    </div>
                  </div>
                  <br />

                  <!-- Terceira linha do Formulário -->
                  <div class="form-inline">
                    <div class="form-group">
                      {!! Form::label('email', 'E-mail') !!}
                      {!! Form::label('email', '*', ['style'=>'color:red']) !!}
                      <br />
                      {!! Form::email('email', null, ['style' => 'width: 250px; margin-right: 20px;', 'class'=>'form-control', 'required']) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label('site', 'Site') !!}<br />
                      {!! Form::input('text', 'site', null, ['style' => 'width: 200px; margin-right: 20px;', 'class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label('telefone', 'Telefone') !!}
                      {!! Form::label('telefone', '*', ['style'=>'color:red']) !!}
                      <br />
                      {!! Form::input('text', 'telefone', null, ['style' => 'width: 130px; margin-right: 20px;', 'class'=>'form-control phone_with_ddd', 'required']) !!}
                    </div>
                  </div>
                  <br />

                  <!-- Quarta linha do Formulário -->
                  <div class="form-inline">
                    <div class="form-group">
                      {!! Form::label('rua', 'Rua') !!}
                      {!! Form::label('rua', '*', ['style'=>'color:red']) !!}
                      <br />
                      {!! Form::input('text', 'rua', null, ['style' => 'width: 300px; margin-right: 20px;', 'class'=>'form-control', 'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label('bairro', 'Bairro') !!}
                      {!! Form::label('bairro', '*', ['style'=>'color:red']) !!}
                      <br />
                      {!! Form::input('text', 'bairro', null, ['style' => 'width: 200px; margin-right: 20px;', 'class'=>'form-control', 'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label('numero', 'Número') !!}
                      {!! Form::label('numero', '*', ['style'=>'color:red']) !!}
                      <br />
                      {!! Form::input('text', 'numero', null, ['style' => 'width: 80px; margin-right: 20px;', 'class'=>'form-control', 'required']) !!}
                    </div>
                  </div>
                  <br />

                  <!-- Quarta linha do Formulário -->
                  <div class="form-inline">
                    <div class="form-group">
                      {!! Form::label('cidade', 'Cidade') !!}
                      {!! Form::label('cidade', '*', ['style'=>'color:red']) !!}
                      <br />
                      {!! Form::input('text', 'cidade', null, ['style' => 'width: 300px; margin-right: 20px;', 'class'=>'form-control', 'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label('cep', 'CEP') !!}
                      {!! Form::label('cep', '*', ['style'=>'color:red']) !!}
                      <br />
                      {!! Form::input('text', 'cep', null, ['style' => 'width: 200px; margin-right: 20px;', 'class'=>'form-control cep', 'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label('uf', 'UF') !!}
                      {!! Form::label('uf', '*', ['style'=>'color:red']) !!}
                      <br />
                      {{ Form::select('selectUF', $ufs, $ufSelected, array('style' => 'width: 80px;', 'class' => 'form-control', 'required')) }}
                    </div>
                  </div>
                  <br />

                  <!-- Quinta linha do Formulário -->
                  <div class="form-inline">
                    <div class="form-group">
                      {!! Form::label('logo', 'Logo da Empresa') !!}<br />
                      {!! Form::file('logo') !!}
                    </div>
                  </div>
                  <br />

                  <!-- Sexta linha do Formulário -->
                  <div class="form-inline">
                    <div class="form-group">
                      <img src='{{ $empresa->logo }}'/>
                    </div>
                  </div>
                  <br />

                  {!! Form::label('campo_obrigatorio', '*', ['style'=>'color:red']) !!}
                  {!! Form::label('campo_obrigatorio', ' Campos obrigatórios') !!}<br />

                @if($empresa->id != -1)
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
