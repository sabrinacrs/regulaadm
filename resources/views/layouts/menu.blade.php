
<div class="row menu-vertical">
    <div class="col-sm-2 col-md-2" style="position: absolute;">
        <div class="panel-group" id="accordion">

            {{--  cultivares  --}}
            <div class="panel panel-default noborder">
                <div class="panel-heading" style="background-color: #5BAB5E">
                    <label class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Cultivares</a>
                    </label>
                </div>
                <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body body-background">
                    <ul class="nav nav-pills nav-stacked">
                    <li class="submenu"><a href="{{ url('/cultivares') }}">Nova</a></li>
                    <li class="submenu"><a href="{{ url('/cultivares/lista') }}">Listar</a></li>
                    {{-- <li class="submenu"><a href="{{ url('/cultivares/buscar') }}">Buscar</a></li> --}}
                    </ul>
                </div>
                </div>
            </div>

            {{--  doenças   --}}
            <div class="panel panel-default noborder">
                <div class="panel-heading" style="background-color: #5BAB5E">
                    <label class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Doenças</a>
                    </label>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body body-background">
                    <ul class="nav nav-pills nav-stacked">
                    <li class="submenu"><a href="{{ url('/doencas') }}">Nova</a></li>
                    <li class="submenu"><a href="{{ url('/doencas/lista') }}">Listar</a></li>
                    </ul>
                </div>
                </div>
            </div>

            {{--  tolerancias  --}}
            <div class="panel panel-default noborder">
                <div class="panel-heading" style="background-color: #5BAB5E">
                    <label class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Tolerância</a>
                    </label>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body body-background">
                    <ul class="nav nav-pills nav-stacked">
                    <li class="submenu"><a href="{{ url('/tolerancias') }}">Nova</a></li>
                    <li class="submenu"><a href="{{ url('/tolerancias/lista') }}">Listar</a></li>
                    </ul>
                </div>
                </div>
            </div>

            {{--  ciclos  --}}
            <div class="panel panel-default noborder">
                <div class="panel-heading" style="background-color: #5BAB5E">
                    <label class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Ciclos</a>
                    </label>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                    <div class="panel-body body-background">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="submenu"><a href="{{ url('/ciclos') }}">Novo</a></li>
                        <li class="submenu"><a href="{{ url('/ciclos/lista') }}">Listar</a></li>
                    </ul>
                    </div>
                </div>
            </div>

            {{--  epoca semeadura  --}}
            <div class="panel panel-default noborder">
                <div class="panel-heading" style="background-color: #5BAB5E">
                    <label class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Época Semeadura</a>
                    </label>
                </div>
                <div id="collapseFive" class="panel-collapse collapse">
                    <div class="panel-body body-background">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="submenu"><a href="{{ url('/epocas_semeadura') }}">Nova</a></li>
                        <li class="submenu"><a href="{{ url('/epocas_semeadura/lista') }}">Listar</a></li>
                    </ul>
                    </div>
                </div>
            </div>

            {{--  clientes  --}}
            <div class="panel panel-default noborder">
                <div class="panel-heading" style="background-color: #5BAB5E">
                    <label class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Clientes</a>
                    </label>
                </div>
                <div id="collapseSix" class="panel-collapse collapse">
                    <div class="panel-body body-background">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="submenu"><a href="{{ url('/clientes/') }}">Listar</a></li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
