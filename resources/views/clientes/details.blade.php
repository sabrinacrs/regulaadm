@extends('layouts.app')

@if(Auth::check())
    @section('content')
    <div class="container container-content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default noborder nopadding">
                    {{--  panel header  --}}
                    <div class="panel-heading no-background">
                        <h2>CLIENTE: {{ $cliente->nome }}</h2>
                    </div>

                    {{--  panel body  --}}
                    <div class="panel-body">
                        <table class="table table-bordered table-striped" data-toggle="dataTable" style="">
                            <tbody>

                                {{--  linha Nome  --}}
                                <tr>
                                    <td><b>Nome</b></td>
                                    <td colspan="5">{{ $cliente->nome }}</td>
                                </tr>

                                {{--  linha Email  --}}
                                <tr>
                                    <td><b>E-mail</b></td>
                                    <td colspan="5">{{ $cliente->email }}</td>
                                </tr>

                                {{--  linha Login  --}}
                                <tr>
                                    <td><b>Login</b></td>
                                    <td colspan="3">{{ $cliente->login }}</td>

                                    <td><b>Status</b></td>
                                    <td>
                                        @if($cliente->status == 'A')
                                            Ativado &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="{{ action('ClientesController@disableEnableCliente', $cliente->id) }}" class="">Desativar</a>
                                        @else
                                            Desativado &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="{{ action('ClientesController@disableEnableCliente', $cliente->id) }}" class="">Ativar</a>
                                        @endif
                                    </td>
                                </tr>

                                {{--  linha Telefone  --}}
                                <tr>
                                    <td><b>Telefone</b></td>
                                    <td colspan="5">{{ $cliente->telefone }}</td>
                                </tr>

                                {{--  linha CPF  --}}
                                <tr>
                                    <td><b>CPF</b></td>
                                    <td colspan="5">{{ $cliente->cpf }}</td>
                                </tr>

                                {{--  linha Logradouro  --}}
                                <tr>
                                    <td><b>Logradouro</b></td>
                                    <td>{{ $cliente->logradouro }}</td>

                                    <td><b>Bairro</b></td>
                                    <td>{{ $cliente->bairro }}</td>
                                    
                                    <td><b>Nº</b></td>
                                    <td>{{ $cliente->numero }}</td>
                                </tr>

                                {{--  linha Cidade  --}}
                                <tr>
                                    <td><b>Cidade</b></td>
                                    <td>{{ $cliente->cidade }}</td>

                                    <td><b>UF</b></td>
                                    <td>{{ $cliente->uf }}</td>

                                    <td><b>CEP</b></td>
                                    <td>{{ $cliente->cep }}</td>
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