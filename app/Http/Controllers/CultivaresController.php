<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cultivar;
use App\CultivarHasDoencas;
use App\CultivarHasEpocaSemeadura;
use App\EpocasSemeadura;
use App\Doenca;
use App\Tolerancia;
use App\Ciclo;
use Redirect;
use DB;
use Validator;


class CultivaresController extends Controller
{

    public function index()
    {
        // carregar arrays para selects
        $ciclos = Ciclo::where('status', '')->orderBy('descricao')->lists('descricao', 'id');
        $tolerancias = Tolerancia::where('status', '')->orderBy('descricao')->get();
        $epocasSemeadura = EpocasSemeadura::where('status', '')->lists('descricao', 'id');
        $doencas = $this->arrayDoencas();

        // retorna para o formulário de nova cultivar
        $params = [
            'doencas' => $doencas, 
            'tolerancias' => $tolerancias, 
            'ciclos' => $ciclos, 
            'epocasSemeadura' => $epocasSemeadura
        ];

        return view('cultivares.nova', $params); // substituir formulário por principal
    }

    public function salvar(Request $request)
    {
        // carregar arrays para selects
        $tolerancias = Tolerancia::where('status', '')->orderBy('descricao')->get();
        $epocasSemeadura = EpocasSemeadura::where('status', '')->lists('descricao', 'id');
        $doencas = $this->arrayDoencas();

        // novo cultivar
        $cultivar = new Cultivar();
        $cultivarNova = new Cultivar();

        // valores decimais com máscara do request
        $rendimentoFibraMinimo = $this->getValor($request->input('rendimento_fibra_minimo'));
        $rendimentoFibraMaximo = $this->getValor($request->input('rendimento_fibra_maximo'));
        $pesoCapulhoMinimo = $this->getValor($request->input('peso_capulho_minimo'));
        $pesoCapulhoMaximo = $this->getValor($request->input('peso_capulho_maximo'));
        $comprimentoFibraMinimo = $this->getValor($request->input('comprimento_fibra_minimo'));
        $comprimentoFibraMaximo = $this->getValor($request->input('comprimento_fibra_maximo'));
        $micronaireMinimo = $this->getValor($request->input('micronaire_minimo'));
        $micronaireMaximo = $this->getValor($request->input('micronaire_maximo'));
        $resistenciaMinimo = $this->getValor($request->input('resistencia_minimo'));
        $resistenciaMaximo = $this->getValor($request->input('resistencia_maximo'));
        $pesoSementesMinimo = $this->getValor($request->input('peso_sementes_minimo'));
        $pesoSementesMaximo = $this->getValor($request->input('peso_sementes_maximo'));

        $mensagemFalha = "";

        // validações de Min e Max
        if(!$this->validateMinMax($rendimentoFibraMinimo, $rendimentoFibraMaximo))
            $mensagemFalha .= "Rendimento mínimo não pode ser maior que o máximo <br />";
        if(!$this->validateMinMax($pesoCapulhoMinimo, $pesoCapulhoMaximo))
            $mensagemFalha .= "O peso mínimo do capulho não pode ser maior que o máximo <br />";
        if(!$this->validateMinMax($comprimentoFibraMinimo, $comprimentoFibraMaximo))
            $mensagemFalha .= "O comprimento da fibra mínimo não pode ser maior que o máximo <br />";
        if(!$this->validateMinMax($micronaireMinimo, $micronaireMaximo))
            $mensagemFalha .= "Micronaire mínimo não pode ser maior que o máximo <br />";
        if(!$this->validateMinMax($resistenciaMinimo, $resistenciaMaximo))
            $mensagemFalha .= "Resistência mínima não pode ser maior que a resistência máxima <br />";
        if(!$this->validateMinMax($pesoSementesMinimo, $pesoSementesMaximo))
            $mensagemFalha .= "Peso sementes mínimo não pode ser maior que o peso máximo <br />";

        if(strcmp($mensagemFalha, "") != 0)
        {
            // mensagem de falha
            \Session::flash('mensagem_falha', $mensagemFalha);

            return back()->withInput();
        }
        else {
            // query para salvar cultivar
            $query = [
                'nome' => $request->input('nome'),
                'altura_planta' => $request->get('selectAltura'),
                'fertilidade' => $request->get('selectFertilidade'),
                'regulador' => $request->get('selectRegulador'),
                'rendimento_fibra_minimo' => $rendimentoFibraMinimo,
                'rendimento_fibra_maximo' => $rendimentoFibraMaximo,
                'peso_capulho_minimo' => $pesoCapulhoMinimo,
                'peso_capulho_maximo' => $pesoCapulhoMaximo,
                'comprimento_fibra_minimo' => $comprimentoFibraMinimo,
                'comprimento_fibra_maximo' => $comprimentoFibraMaximo,
                'micronaire_minimo' => $micronaireMinimo,
                'micronaire_maximo' => $micronaireMaximo,
                'resistencia_minimo' => $resistenciaMinimo,
                'resistencia_maximo' => $resistenciaMaximo,
                'peso_sementes_minimo' => $pesoSementesMinimo,
                'peso_sementes_maximo' => $pesoSementesMaximo,
                'status' => $request->input('status'),
                'cic_id' => intval($request->input('selectCiclo'))
            ];

            // executa query para salvar cultivar
            $cultivar = $cultivar->create($query);

            // salva cultivar has epoca semeadura
            foreach($epocasSemeadura as $epocaSemeadura => $value)
            {
                $cultivarHasEpocaSemeadura = new CultivarHasEpocaSemeadura();
                // constroi string query
                $queryCultivarHasEpocaSemeadura = [
                    'cult_id' => $cultivar->id,
                    'ep_id' => intval($epocaSemeadura),
                    'plantas_ha' => $this->getValor($request->input(str_replace(' ', '', $value)))
                ];

                $cultivarHasEpocaSemeadura->create($queryCultivarHasEpocaSemeadura);
            }

            // mensagem de sucesso
            \Session::flash('mensagem_sucesso', 'Cultivar cadastrada com sucesso.');

            // Se estiver inserindo nova, vai para formulário de doenças, se não, vai para lista
            if($request->is('cultivares/salvar'))
                return Redirect::to('cultivares/doencas');
            else
                return Redirect::to('cultivares/lista');
        }
    }

    public function nova()
    {
        // carregar arrays para selects
        $ciclos = Ciclo::where('status', '')->orderBy('descricao')->lists('descricao', 'id');
        $tolerancias = Tolerancia::where('status', '')->orderBy('descricao')->get(); //->lists('descricao', 'id');
        $epocasSemeadura = EpocasSemeadura::where('status', '')->lists('descricao', 'id');
        $doencas = $this->arrayDoencas();

        return view('cultivares.nova', ['doencas'=> $doencas, 'tolerancias'=>$tolerancias, 'ciclos'=>$ciclos, 'epocasSemeadura'=>$epocasSemeadura]); // substituir formulário por principal
    }

    public function lista()
    {
        // $cultivares = Cultivar::where('status', '')->get();
        $cultivares = DB::table('cultivares')->where('status', '<>', 'I')->paginate(10);//get(); //$this->arrayCultivares(); // ->get()->paginate(10);//
        $links = $cultivares->links();

        return view('cultivares.lista', ['cultivares'=>$cultivares, 'links'=>$links]);
    }

    public function editar($id)
    {
        $cultivares = $this->arrayCultivares();
        $cultivar = Cultivar::findOrFail($id);

        //
        $ciclos = Ciclo::where('status', '')->orderBy('descricao')->lists('descricao', 'id');
        $tolerancias = Tolerancia::where('status', '')->orderBy('descricao')->get();//->lists('descricao', 'id');
        $epocasSemeadura = EpocasSemeadura::where('status', '')->lists('descricao', 'id');
        $doencas = $this->arrayDoencas();

        // recupera quantidade de plantas/ha da cultivar
        $cultivaresHasEpocaSemeadura_table = CultivarHasEpocaSemeadura::get();
        $cultivaresHasEpocaSemeadura = array();
        foreach ($cultivaresHasEpocaSemeadura_table as $cultivarEpocaSemeadura => $value)
        {
            if($value->cult_id == $cultivar->id)
                array_push($cultivaresHasEpocaSemeadura, $value);
        }

        // recupera tolerância às doenças da cultivar
        $cultivaresHasDoencas_table = CultivarHasDoencas::get();
        $cultivarHasDoencas = array();
        foreach ($cultivaresHasDoencas_table as $cultivarDoencaTolerancia => $value)
        {
            if($value->cult_id == $cultivar->id)
                array_push($cultivarHasDoencas, $value);
        }

        $params = [
            'doencas' => $doencas,
            'tolerancias' => $tolerancias,
            'ciclos' => $ciclos,
            'cultivares' => $cultivares,
            'cultivar' => $cultivar,
            'cultivarHasDoencas' => $cultivarHasDoencas,
            'epocasSemeadura' => $epocasSemeadura,
            'cultivaresHasEpocaSemeadura' => $cultivaresHasEpocaSemeadura
        ];

        return view('cultivares.nova', $params);
    }

    public function atualizar($id, Request $request)
    {
        $cultivares = $this->arrayCultivares();
        $cultivar = Cultivar::findOrFail($id);

        $rendimentoFibraMinimo = $this->getValor($request->input('rendimento_fibra_minimo'));
        $rendimentoFibraMaximo = $this->getValor($request->input('rendimento_fibra_maximo'));
        $pesoCapulhoMinimo = $this->getValor($request->input('peso_capulho_minimo'));
        $pesoCapulhoMaximo = $this->getValor($request->input('peso_capulho_maximo'));
        $comprimentoFibraMinimo = $this->getValor($request->input('comprimento_fibra_minimo'));
        $comprimentoFibraMaximo = $this->getValor($request->input('comprimento_fibra_maximo'));
        $micronaireMinimo = $this->getValor($request->input('micronaire_minimo'));
        $micronaireMaximo = $this->getValor($request->input('micronaire_maximo'));
        $resistenciaMinimo = $this->getValor($request->input('resistencia_minimo'));
        $resistenciaMaximo = $this->getValor($request->input('resistencia_maximo'));
        $pesoSementesMinimo = $this->getValor($request->input('peso_sementes_minimo'));
        $pesoSementesMaximo = $this->getValor($request->input('peso_sementes_maximo'));

        $mensagemFalha = "";

        // validações de Min e Max
        if(!$this->validateMinMax($rendimentoFibraMinimo, $rendimentoFibraMaximo))
            $mensagemFalha .= "Rendimento mínimo não pode ser maior que o máximo <br />";
        if(!$this->validateMinMax($pesoCapulhoMinimo, $pesoCapulhoMaximo))
            $mensagemFalha .= "O peso mínimo do capulho não pode ser maior que o máximo <br />";
        if(!$this->validateMinMax($comprimentoFibraMinimo, $comprimentoFibraMaximo))
            $mensagemFalha .= "O comprimento da fibra mínimo não pode ser maior que o máximo <br />";
        if(!$this->validateMinMax($micronaireMinimo, $micronaireMaximo))
            $mensagemFalha .= "Micronaire mínimo não pode ser maior que o máximo <br />";
        if(!$this->validateMinMax($resistenciaMinimo, $resistenciaMaximo))
            $mensagemFalha .= "Resistência mínima não pode ser maior que a resistência máxima <br />";
        if(!$this->validateMinMax($pesoSementesMinimo, $pesoSementesMaximo))
            $mensagemFalha .= "Peso sementes mínimo não pode ser maior que o peso máximo <br />";

        if(strcmp($mensagemFalha, "") != 0)
        {
            // mensagem de falha
            \Session::flash('mensagem_falha', $mensagemFalha);

            return back()->withInput();
        }
        else {
            $query = [
                'nome' => $request->input('nome'),
                'altura_planta' => $request->get('selectAltura'),
                'fertilidade' => $request->get('selectFertilidade'),
                'regulador' => $request->get('selectRegulador'),
                'rendimento_fibra_minimo' => $rendimentoFibraMinimo,
                'rendimento_fibra_maximo' => $rendimentoFibraMaximo,
                'peso_capulho_minimo' => $pesoCapulhoMinimo,
                'peso_capulho_maximo' => $pesoCapulhoMaximo,
                'comprimento_fibra_minimo' => $comprimentoFibraMinimo,
                'comprimento_fibra_maximo' => $comprimentoFibraMaximo,
                'micronaire_minimo' => $micronaireMinimo,
                'micronaire_maximo' => $micronaireMaximo,
                'resistencia_minimo' => $resistenciaMinimo,
                'resistencia_maximo' => $resistenciaMaximo,
                'peso_sementes_minimo' => $pesoSementesMinimo,
                'peso_sementes_maximo' => $pesoSementesMaximo,
                'cic_id' => intval($request->input('selectCiclo'))
            ];

            $cultivar->update($query);

            // atualiza cultivar has epoca semeadura
            $epocasSemeadura = EpocasSemeadura::where('status', '')->lists('descricao', 'id');
            foreach($epocasSemeadura as $epocaSemeadura => $value)
            {
                $cultivarHasEpocaSemeadura = CultivarHasEpocaSemeadura::where('cult_id', $cultivar->id)->where('ep_id', intval($epocaSemeadura))->get();
                $cultivarUpdate = $cultivarHasEpocaSemeadura[0];

                // constroi string query
                $queryCultivarHasEpocaSemeadura = [
                    'cult_id' => $cultivar->id,
                    'ep_id' => $epocaSemeadura,
                    'plantas_ha' => $this->getValor($request->input(str_replace(' ', '', $value)))
                ];
                //$cultivarUpdate->update($queryCultivarHasEpocaSemeadura);

                CultivarHasEpocaSemeadura::where('cult_id', $cultivar->id)
                                        ->where('ep_id', intval($epocaSemeadura))
                                        ->update(['plantas_ha' => $this->getValor($request->input(str_replace(' ', '', $value)))]);
            }

            \Session::flash('mensagem_sucesso', 'Cultivar atualizada com sucesso.');

            return Redirect::to('cultivares');
        }

    }

    public function vincularCultivarDoencaTolerancia(Request $request)
    {
        // carregar arrays para selects
        $cultivar = Cultivar::all()->last();
        $tolerancias = Tolerancia::where('status', '')->orderBy('descricao')->get();//->lists('descricao', 'id');
        $doencas = $this->arrayDoencas();

        return view('cultivares.cultivaresDoencas', ['cultivar' => $cultivar, 'doencas' => $doencas, 'tolerancias' => $tolerancias]);
    }

    public function alterarVinculoCultivarDoencaTolerancia($cultivarId)
    {
        // carregar arrays para selects
        $cultivar = Cultivar::findOrFail($cultivarId);
        $tolerancias = Tolerancia::where('status', '')->orderBy('descricao')->get();//->lists('descricao', 'id');
        $doencas = $this->arrayDoencas();
        $cultivarHasDoencas = CultivarHasDoencas::where('cult_id', $cultivar->id)->get();

        return view('cultivares.cultivaresDoencas', ['cultivar' => $cultivar,
                                                    'doencas' => $doencas,
                                                    'tolerancias' => $tolerancias,
                                                    'cultivarHasDoencas'=>$cultivarHasDoencas]);
    }

    public function salvarVinculoCultivarDoencaTolerancia(Request $request)
    {
        $cultivar = json_decode($request->get('cultivar'));
        $doenca = json_decode($request->get('doenca'));
        $toleranciaId = json_decode($request->get('selectTolerancia'));
        $tolerancia = $request->get('selectTolerancia');

        $cultivarHasDoencas = new CultivarHasDoencas();

        $query = [
            'cult_id' => $cultivar->id,
            'doe_id' => $doenca->id,
            'tol_id' => $toleranciaId
        ];

        $cultivaresHasDoencas_table = CultivarHasDoencas::where('cult_id', $cultivar->id)->where('doe_id', $doenca->id)->lists('cult_id', 'doe_id', 'tol_id');

        //var_dump($cultivaresHasDoencas_table);
        if(sizeof($cultivaresHasDoencas_table) <= 0) {
            $cultivarHasDoencas = $cultivarHasDoencas->create($query);
        }
        else {
            $cultivarHasDoencas->update($query);
        }

        \Session::flash('mensagem_sucesso', 'Doenças vinculadas com sucesso.');

        return Redirect::to('cultivares/lista');
    }

    public function salvarTodoVinculoCultivarDoencaTolerancia(Request $request)
    {
        // pega cultivar
        $cultivar = json_decode($request->get('cultivar'));

        // pegar tolerancia id e doenca
        // listar todas as doencas
        $doencas = $this->arrayDoencas();

        //var_dump($request->All());
        foreach ($doencas as $doenca) {
            $nameRadio = 'radio'.$doenca->id;

            // pega id da tolerancia
            $toleranciaId = intval($request->get($nameRadio));

            $query = [
                'cult_id' => $cultivar->id,
                'doe_id' => $doenca->id,
                'tol_id' => $toleranciaId
            ];

            // lista dados da tabela CultivaresHasDoencas
            $cultivarHasDoencas = new CultivarHasDoencas();
            $cultivaresHasDoencas_table = CultivarHasDoencas::where('cult_id', $cultivar->id)
                                                            ->where('doe_id', $doenca->id)
                                                            ->lists('cult_id', 'doe_id', 'tol_id');

            //Se não houver nenhum registro da cultivar e doenca, cria novo
            if(sizeof($cultivaresHasDoencas_table) <= 0) {
                $cultivarHasDoencas = $cultivarHasDoencas->create($query);
            }
            else {
                // atualiza registro de cultivar, doença e tolerância
                cultivarHasDoencas::where('cult_id', $cultivar->id)->where('doe_id', $doenca->id)->update(['tol_id' => $toleranciaId]);
            }
        }

        \Session::flash('mensagem_sucesso', 'Doenças vinculadas com sucesso.');

        return Redirect::to('cultivares/lista');
    }

    public function excluir($id)
    {
        $cultivar = Cultivar::findOrFail($id);
        $cultivar->status = 'I';
        $cultivar->update();

        \Session::flash('mensagem_sucesso', 'Cultivar excluída com sucesso.');

        return Redirect::to('cultivares/lista');
    }

    public function buscar(Request $request)
    {
        $filtro = $request->get('buscar');

        if(empty($filtro)) {
            //$cultivares = Cultivar::get();
            $cultivares = DB::table('cultivares')->where('status', '<>', 'I')->paginate(10);//get(); // >where('status', '<>', 'I')->
        }
        else {
            $cultivares = DB::table('cultivares')
                        ->where([
                            ['nome', 'like', '%'.$filtro.'%'],
                            ['status', '<>', 'I']
                        ])->paginate(10); //->get();
        }

        $links = $cultivares->links();

        return view('cultivares.lista', ['cultivares' => $cultivares,
                                        'links' => $links]);
    }

    public function detailsCultivar($id)
    {
        $cultivar = Cultivar::findOrFail($id);
        $params = ['cultivar' => $cultivar];        
        return view('cultivares.details', $params);
    }

    private function getValor($entrada)
    {
        // se a entrada veio sem vírgula
        if(strlen($entrada) < 4)
            $entrada .= ",00";

        $entrada = str_replace(",",".", $entrada);
        $valor = (double)$entrada;

        return $valor;
    }

    private function validateMinMax($min, $max)
    {
        if($min > $max)
            return false;

        return true;
    }

  // private function validateFields()
  // {
  //     $mensagem = "";
  //
  //     // validações de Min e Max
  //     if(!$this->validateMinMax($rendimentoFibraMinimo, $rendimentoFibraMaximo))
  //       $mensagemFalha += "Rendimento mínimo não pode ser maior que o máximo \n";
  //     if(!$this->validateMinMax($pesoCapulhoMinimo, $pesoCapulhoMaximo))
  //       $mensagemFalha += "O peso mínimo do capulho não pode ser maior que o máximo \n";
  //     if(!$this->validateMinMax($comprimentoFibraMinimo, $comprimentoFibraMaximo))
  //       $mensagemFalha += "O comprimento da fibra mínimo não pode ser maior que o máximo \n";
  //     if(!$this->validateMinMax($micronaireMinimo, $micronaireMaximo))
  //       $mensagemFalha += "Micronaire mínimo não pode ser maior que o máximo \n";
  //     if(!$this->validateMinMax($resistenciaMinimo, $resistenciaMaximo))
  //       $mensagemFalha += "Resistência mínima não pode ser maior que a resistência máxima \n";
  //     if(!$this->validateMinMax($pesoSementesMinimo, $pesoSementesMaximo))
  //       $mensagemFalha += "Peso sementes mínimo não pode ser maior que o peso máximo \n";
  //
  //     return $mensagem;
  // }

    private function arrayCultivares()
    {
        $cultivares_table = Cultivar::get();
        $cultivares = array();

        foreach($cultivares_table as $cultivar)
        {
            if($cultivar->status != 'I')
                array_push($cultivares, $cultivar);
        }

        return $cultivares;
    }

    private function arrayDoencas()
    {
        $doencas_table = Doenca::get();
        $doencas = array();

        foreach($doencas_table as $doenca)
        {
            if($doenca->status != 'I')
                array_push($doencas, $doenca);
        }

        return $doencas;
    }

    public function getJson()
    {
        $cultivares = DB::table('cultivares')->where('status', '<>', 'I')->get();

        return response()->json($cultivares);
    }

    public function getJsonCultivarEpocaSemeadura()
    {
        $cultivaresEpocaSemeadura = DB::table('cultivares_has_epocasemeadura')->get();

        return response()->json($cultivaresEpocaSemeadura);
    }

    public function getJsonCultivarDoenca()
    {
        $cultivaresDoencas = DB::table('cultivares_has_doencas')->get();

        return response()->json($cultivaresDoencas);
    }

}
