@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default noborder">
                <div class="panel-heading">
                    <h3>Bem-Vindo (a)</h3>
                </div>

                <div class="panel-body">
                    Utilize o menu ao lado para navegar e gerenciar a Base de Dados do CottonApp
                    <br>

                    {{--  Mensagem de Sucesso após disponibilizar atualizacoes  --}}
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">
                        {{ Session::get('mensagem_sucesso') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
