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


class CultivaresController extends Controller
{

  public function index()
  {
      $ciclos = Ciclo::where('status', '')->orderBy('descricao')->lists('descricao', 'id');
      $tolerancias = Tolerancia::where('status', '')->orderBy('descricao')->lists('descricao', 'id');
      $epocasSemeadura = EpocasSemeadura::where('status', '')->lists('descricao', 'id');
      $doencas = $this->arrayDoencas();

      return view('cultivares.nova', ['doencas'=> $doencas, 'tolerancias'=>$tolerancias, 'ciclos'=>$ciclos, 'epocasSemeadura'=>$epocasSemeadura]); // substituir formulário por principal
  }

  public function salvar(Request $request)
  {
      $tolerancias = Tolerancia::where('status', '')->orderBy('descricao')->lists('descricao', 'id');
      $epocasSemeadura = EpocasSemeadura::where('status', '')->lists('descricao', 'id');
      $doencas = $this->arrayDoencas();

      $cultivar = new Cultivar();
      $cultivarNova = new Cultivar();

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

       \Session::flash('mensagem_sucesso', 'Cultivar cadastrada com sucesso.');
      //
       if($request->is('cultivares/salvar')) //  //return view('cultivares.listaDoencas', ['doencas'=> $doencas, 'tolerancias'=>$tolerancias, 'cultivar'=>$cultivar]); // substituir formulário por principal
         return Redirect::to('cultivares/doencas');
      else
        return Redirect::to('cultivares/lista');
  }

  public function nova()
  {
      $ciclos = Ciclo::where('status', '')->orderBy('descricao')->lists('descricao', 'id');
      $tolerancias = Tolerancia::where('status', '')->orderBy('descricao')->lists('descricao', 'id');
      $epocasSemeadura = EpocasSemeadura::where('status', '')->lists('descricao', 'id');
      $doencas = $this->arrayDoencas();

      return view('cultivares.nova', ['doencas'=> $doencas, 'tolerancias'=>$tolerancias, 'ciclos'=>$ciclos, 'epocasSemeadura'=>$epocasSemeadura]); // substituir formulário por principal
  }

  public function lista()
  {
      $cultivares = $this->arrayCultivares();
      return view('cultivares.lista', ['cultivares' => $cultivares]);
  }

  public function editar($id)
  {
      $cultivares = $this->arrayCultivares();
      $cultivar = Cultivar::findOrFail($id);

      $ciclos = Ciclo::where('status', '')->orderBy('descricao')->lists('descricao', 'id');
      $tolerancias = Tolerancia::where('status', '')->orderBy('descricao')->lists('descricao', 'id');
      $epocasSemeadura = EpocasSemeadura::where('status', '')->lists('descricao', 'id');
      $doencas = $this->arrayDoencas();

      $cultivaresHasDoencas_table = DB::table('cultivares_has_doencas')->where('cult_id', $cultivar->id)->get();

      $cultivarHasDoencas = array();
      foreach ($cultivaresHasDoencas_table as $cultivarDoencaTolerancia => $value)
      {
          array_push($cultivarHasDoencas, $value);
      }

      return view('cultivares.nova', ['doencas'=> $doencas, 'tolerancias'=>$tolerancias, 'ciclos'=>$ciclos, 'cultivares'=>$cultivares, 'cultivar' => $cultivar, 'cultivarHasDoencas' => $cultivarHasDoencas, 'epocasSemeadura'=>$epocasSemeadura]);
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

      \Session::flash('mensagem_sucesso', 'Cultivar atualizada com sucesso.');

      return Redirect::to('cultivares');
  }

  public function vincularCultivarDoencaTolerancia(Request $request)
  {
      $cultivar = Cultivar::all()->last();
      $tolerancias = Tolerancia::where('status', '')->orderBy('descricao')->lists('descricao', 'id');
      $doencas = $this->arrayDoencas();

      return view('cultivares.cultivaresDoencas', ['cultivar' => $cultivar, 'doencas' => $doencas, 'tolerancias' => $tolerancias]);
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
      if(sizeof($cultivaresHasDoencas_table) <= 0)
      {
        $cultivarHasDoencas = $cultivarHasDoencas->create($query);
      }
      else{
        $cultivarHasDoencas->update($query);
      }

      \Session::flash('mensagem_sucesso', 'Doenças vinculadas com sucesso.');

      return Redirect::to('cultivares/lista');

      //var_dump($query);
      // var_dump($request->get('cultivar'));
      // var_dump($request->get('doenca'));
      // var_dump($request->get('selectTolerancia'));
  }

  public function salvarTodoVinculoCultivarDoencaTolerancia(Request $request)
  {
      var_dump($request->all());
  }

  public function excluir($id)
  {
      $cultivar = Cultivar::findOrFail($id);
      $cultivar->status = 'I';
      $cultivar->update();

      \Session::flash('mensagem_sucesso', 'Cultivar excluída com sucesso.');

      return Redirect::to('cultivares/lista');
  }

  public function getValor($entrada)
  {
      // se a entrada veio sem vírgula
      if(strlen($entrada) < 4)
        $entrada .= ",00";

      $entrada = str_replace(",",".", $entrada);
      $valor = (double)$entrada;

      return $valor;
  }

  public function buscar(Request $request)
  {
      $filtro = $request->get('buscar');

      if(empty($filtro))
        $cultivares = DB::table('cultivares')->get();
      else {
        $cultivares = DB::table('cultivares')
                      ->where([
                        ['nome', 'like', '%'.$filtro.'%'],
                        ['status', '<>', 'I']
                      ])->get();
      }


      return view('cultivares.lista', ['cultivares' => $cultivares]);
  }

  public function arrayCultivares()
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

  public function arrayDoencas()
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



}
