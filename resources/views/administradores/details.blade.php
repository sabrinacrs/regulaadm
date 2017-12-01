@extends('layouts.app')

@if(Auth::check())
    @section('content')
    <div class="container container-content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default noborder nopadding">
                    {{--  panel header  --}}
                    <div class="panel-heading no-background">
                        <h2>ADMINISTRADOR: {{ $administrador->name }}</h2>
                    </div>

                    {{--  panel body  --}}
                    <div class="panel-body">
                        <table class="table table-bordered table-striped" data-toggle="dataTable" style="">
                            <tbody>

                                {{--  linha Nome  --}}
                                <tr>
                                    <td><b>Nome</b></td>
                                    <td colspan="5">{{ $administrador->name }}</td>
                                </tr>

                                {{--  linha Email  --}}
                                <tr>
                                    <td><b>E-mail</b></td>
                                    <td colspan="5">{{ $administrador->email }}</td>
                                </tr>

                                {{--  linha Login  --}}
                                <tr>
                                    <td><b>Status</b></td>
                                    <td>
                                        @if($administrador->status == 'A')
                                            Ativado &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="{{ action('AdministradoresController@disableEnableAdministrador', $administrador->id) }}" class="">Desativar</a>
                                        @else
                                            Desativado &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="{{ action('AdministradoresController@disableEnableAdministrador', $administrador->id) }}" class="">Ativar</a>
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