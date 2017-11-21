@include('layouts.app')

@if(Auth::check())
    @include('cultivares.formulario')
@endif
