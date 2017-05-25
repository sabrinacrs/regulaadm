@include('layouts.app')

@section('content')
<div class="container container-content">

  <!-- Formulário Para Pesquisa de Cultivar -->
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default noborder">
        <div class="panel-headig">

        </div>

        <div class="panel-body">
          <!-- Campos de Filtragem -->
          {!! Form::open(['method' => 'post', 'url' => 'cultivares/lista/buscar']) !!}  {{-- buscar/'.$filtro] --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
