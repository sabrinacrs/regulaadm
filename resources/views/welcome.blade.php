@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-10" style="padding-top:5%">
            <img src="{{ url('/images/logo.png') }}" alt="Logo CottonApp" style="width:11%; height:11%; margin-left:4%">
        </div>
        <div class="col-md-offset-5 col-md-10">
          <h1 style="color: #3F6B3F">CottonApp</h1>
        </div>
        <div class="col-md-offset-3 col-md-10 ">
          <h3 style="color: #3F6B3F">Informações sobre Cultivares e Semeadura de Algodão</h3>
        </div>
    </div>
</div>
@endsection
