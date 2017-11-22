@extends('layouts.app')

@if(Auth::check())
  @section('content')
    <div class="container container-content">
      <!-- Principal das cultivares chama a lista de cultivares que será um pouco diferente das demais -->
      <!-- O botão de nova cultivar aciona a página nova -->
      <!-- A página nova tem o formulário em cima e a lista de Doencas embaixo -->
    </div>
  @endsection
@endif
