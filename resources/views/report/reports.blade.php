@extends('layouts.app')

@section('content')
<div class="container container-content">
  <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <br /><br />
          <ul>
            <li><a href="{{ url('/report/cultivares') }}" target="_blank">Relatório de cultivares</a></li>
            <li><a href="{{ url('/report/cultivaresCiclos') }}" target="_blank">Relatório de cultivares e ciclos</a></li>
            <li><a href="{{ url('/report/ciclosCultivares') }}" target="_blank">Relatório de cultivares agrupadas por ciclo</a></li>
            <li><a href="{{ url('/report/cultivaresDoencasTolerancias') }}" target="_blank">Relatório de cultivares, doenças e tolerâncias</a></li>
          </ul>
        </div>
  </div>
</div>
@endsection
