@extends('layouts.app')

@if(Auth::check())
    @section('content')
    <div class="container container-content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default noborder nopadding">
                    {{--  panel header  --}}
                    <div class="panel-heading no-background">
                        <h2>TOLERÂNCIA: {{ $tolerancia->descricao }}</h2>
                    </div>

                    {{--  panel body  --}}
                    <div class="panel-body">
                        <table class="table table-bordered table-striped" data-toggle="dataTable" style="">
                            <tbody>

                                {{--  linha ID  --}}
                                <tr>
                                    <td><b></b></td>
                                    <td colspan="5">{{ $tolerancia->id }}</td>
                                </tr>

                                {{--  linha Descrião  --}}
                                <tr>
                                    <td><b>Nome</b></td>
                                    <td colspan="5">{{ $tolerancia->descricao }}</td>
                                </tr>

                                {{--  linha Sigla  --}}
                                <tr>
                                    <td><b>Sigla</b></td>
                                    <td colspan="5">{{ $tolerancia->sigla }}</td>
                                </tr>

                                {{--  linha Status  --}}
                                <tr>
                                    <td><b>Status</b></td>
                                    <td>
                                        @if($tolerancia->status == 'I')
                                            Desativada
                                        @else
                                            Ativada
                                        @endif
                                    </td>
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