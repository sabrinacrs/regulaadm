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
                <th style="padding-left: 20%">TOLERÂNCIA</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($doencas as $doenca)
                <tr>
                  <td class="text-left">{{ $doenca->descricao }}</td>
                  <td style="padding-left: 20%">
                    {{ Form::select('tolerancia', $tolerancias, null, array('style' => 'width: 260px; margin-right: 20px;', 'class' => 'form-control')) }}
                  </td>
                </tr>
              @endforeach
            </tbody>

          </table>
        </div>
    </div>
  </div>
</div>
