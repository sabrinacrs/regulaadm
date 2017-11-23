@extends('layouts.app')

@if(Auth::check())
    @section('content')
        <div class="container container-content">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default noborder nopadding">
                        {{--  panel header  --}}
                        <div class="panel-heading no-background">
                            <h2>CULTIVAR: {{ $cultivar->nome }}</h2>
                        </div>

                        {{--  panel body  --}}
                        <div class="panel-body">
                            <table class="table table-bordered table-striped" data-toggle="dataTable" style="">
                                <tbody>

                                    {{--  linha Nome  --}}
                                    <tr>
                                        <td><b>Nome</b></td>
                                        <td colspan="3">{{ $cultivar->nome }}</td>
                                    </tr>

                                    {{--  linha altura planta  --}}
                                    <tr>
                                        <td><b>Altura Planta</b></td>
                                        <td colspan="3">{{ $cultivar->altura_planta }}</td>
                                    </tr>

                                    {{--  linha fertilidade  --}}
                                    <tr>
                                        <td><b>Fertilidade</b></td>
                                        <td colspan="3">{{ $cultivar->fertilidade }}</td>
                                    </tr>

                                    {{--  linha Regulador  --}}
                                    <tr>
                                        <td><b>Regulador</b></td>
                                        <td colspan="3">{{ $cultivar->regulador }}</td>
                                    </tr>

                                    {{--  linha rendimento fibra  --}}
                                    <tr>
                                        <td colspan="4" align="center"><b>Rendimento Fibra </b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Mínimo</b></td>
                                        <td>{{ $cultivar->rendimento_fibra_minimo }}</td>

                                        <td><b>Máximo</b></td>
                                        <td>{{ $cultivar->rendimento_fibra_maximo }}</td>
                                    </tr>

                                    {{--  peso médio do capulho  --}}
                                    <tr>
                                        <td colspan="4" align="center"><b>Peso Capulho </b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Mínimo</b></td>
                                        <td>{{ $cultivar->peso_capulho_minimo }}</td>

                                        <td><b>Máximo</b></td>
                                        <td>{{ $cultivar->peso_capulho_maximo }}</td>
                                    </tr>

                                    {{--  comprimento fibra  --}}
                                    <tr>
                                        <td colspan="4" align="center"><b>Comprimento Fibra</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Mínimo</b></td>
                                        <td>{{ $cultivar->comprimento_fibra_minimo }}</td>

                                        <td><b>Máximo</b></td>
                                        <td>{{ $cultivar->comprimento_fibra_maximo }}</td>
                                    </tr>

                                    {{--  micronaire  --}}
                                    <tr>
                                        <td colspan="4" align="center"><b>Micronaire</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Mínimo</b></td>
                                        <td>{{ $cultivar->micronaire_minimo }}</td>

                                        <td><b>Máximo</b></td>
                                        <td>{{ $cultivar->micronaire_maximo }}</td>
                                    </tr>

                                    {{--  resistência  --}}
                                    <tr>
                                        <td colspan="4" align="center"><b>Resistência</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Mínimo</b></td>
                                        <td>{{ $cultivar->resistencia_minimo }}</td>

                                        <td><b>Máximo</b></td>
                                        <td>{{ $cultivar->resistencia_maximo }}</td>
                                    </tr>

                                    {{--  peso sementes  --}}
                                    <tr>
                                        <td colspan="4" align="center"><b>Peso Sementes</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Mínimo</b></td>
                                        <td>{{ $cultivar->peso_sementes_minimo }}</td>

                                        <td><b>Mínimo</b></td>
                                        <td>{{ $cultivar->peso_sementes_maximo }}</td>
                                    </tr>

                                    {{--  ciclo  --}}
                                    <tr>
                                        <td><b>Ciclo</b></td>
                                        <td colspan="4">{{ $cultivar->ciclo }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif