@extends('layouts.app')

@if(Auth::check())
    @section('content')
    <div class="container container-content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default noborder nopadding">
                    {{--  panel header  --}}
                    <div class="panel-heading no-background">
                        <h2>CICLO: {{ $ciclo->descricao }}</h2>
                    </div>

                    {{--  panel body  --}}
                    <div class="panel-body">
                        <table class="table table-bordered table-striped" data-toggle="dataTable" style="">
                            <tbody>

                                {{--  linha ID  --}}
                                <tr>
                                    <td><b>ID</b></td>
                                    <td colspan="5">{{ $ciclo->id }}</td>
                                </tr>

                                {{--  linha Descrião  --}}
                                <tr>
                                    <td><b>Descrição</b></td>
                                    <td colspan="5">{{ $ciclo->descricao }}</td>
                                </tr>

                                {{--  linha Status  --}}
                                <tr>
                                    <td><b>Status</b></td>
                                    <td>
                                        @if($ciclo->status == 'I')
                                            Desativado
                                        @else
                                            Ativado
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