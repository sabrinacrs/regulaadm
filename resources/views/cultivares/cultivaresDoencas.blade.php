@include('layouts.app')

@if(Auth::check())
    @include('cultivares.listaDoencas')
@endif
