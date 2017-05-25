@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="padding-top: 8%">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default noborder">
                {{-- <div class="panel-heading">Login</div> --}}
                <div class="panel-body">
                    <h4 align="center">LOGIN</h4><br />
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-3">
                                <input id="email" type="email" class="form-control" name="email" placeholder="Login" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-3">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Senha">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-success" style="width: 100%">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <div class="col-md-6 col-md-offset-3" >
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Continuar Conectado
                                        &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-link" href="{{ url('/password/reset') }}">Esqueceu a senha?</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
