@extends('layouts.app')

@section('content')
<div class="container container-content">
  <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <br /><br />
          <ul>
            <li><a href="{{ url('/report/cultivares') }}" target="_blank">Relatório de Cultivares</a></li>
            <li><a href="{{ url('/report/cultivaresCiclos') }}" target="_blank">Relatório de Cultivares e Ciclos</a></li>
            <li><a href="{{ url('/report/cultivaresDoencasTolerancias') }}" target="_blank">Relatório de Cultivares, Doenças e Tolerâncias</a></li>
          </ul>
        </div>
  </div>
</div>
@endsection
