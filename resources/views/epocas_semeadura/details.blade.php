@extends('layouts.app')

@if(Auth::check())
    @section('content')
    <div class="container container-content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default noborder nopadding">
                    {{--  panel header  --}}
                    <div class="panel-heading no-background">
                        <h2>ÉPOCA DE SEMEADURA: {{ $epoca->descricao }}</h2>
                    </div>

                    {{--  panel body  --}}
                    <div class="panel-body">
                        <table class="table table-bordered table-striped" data-toggle="dataTable" style="">
                            <tbody>

                                {{--  linha ID  --}}
                                <tr>
                                    <td><b></b></td>
                                    <td colspan="5">{{ $epoca->id }}</td>
                                </tr>

                                {{--  linha Descrião  --}}
                                <tr>
                                    <td><b>Descrição</b></td>
                                    <td colspan="5">{{ $epoca->descricao }}</td>
                                </tr>

                                {{--  linha Status  --}}
                                <tr>
                                    <td><b>Status</b></td>
                                    <td>
                                        @if($epoca->status == 'I')
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