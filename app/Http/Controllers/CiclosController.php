<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\HistoricoAtualizacao;
use App\Ciclo;
use Redirect;
use DB;


class CiclosController extends Controller
{

    public function index()
    {
        $ciclos = $this->arrayCiclos();
        return view('ciclos.principal');
    }

    public function lista()
    {
        $ciclos = DB::table('ciclos')->paginate(10);
        $links = $ciclos->links();
        return view('ciclos.lista', ['ciclos' => $ciclos, 'links' => $links]);
    }

    public function salvar(Request $request)
    {
        $ciclo = new Ciclo();
        $ciclo = $ciclo->create($request->all());

        \Session::flash('mensagem_sucesso', 'Ciclo cadastrado com sucesso.');

        // insere alteração no historico
        $release = new HistoricoAtualizacao();
        $release->saveRelease();

        if($request->is('ciclos/salvar'))
            return Redirect::to('ciclos');
        else
            return Redirect::to('ciclos/lista/novo');
    }

    public function novo(Request $request)
    {
        $ciclos = DB::table('ciclos')->paginate(10);
        $links = $ciclos->links();
        return view('ciclos.lista', ['ciclos'=>$ciclos, 'links'=>$links]);
    }

    public function editar($id)
    {
        $ciclos = DB::table('ciclos')->paginate(10);
        $links = $ciclos->links();
        $ciclo = Ciclo::findOrFail($id);
        return view('ciclos.lista', ['ciclos'=>$ciclos, 'ciclo' => $ciclo, 'links'=>$links]);
    }

    public function atualizar($id, Request $request)
    {
        $ciclos = $this->arrayCiclos();
        $ciclo = Ciclo::findOrFail($id);
        $ciclo->update($request->all());

        // insere alteração no historico
        $release = new HistoricoAtualizacao();
        $release->saveRelease();

        \Session::flash('mensagem_sucesso', 'Ciclo atualizado com sucesso.');

        return Redirect::to('ciclos/lista/'.$ciclo->id.'/editar');
    }

    public function excluir($id)
    {
        $ciclo = Ciclo::findOrFail($id);
        $ciclo->delete();

        // insere alteração no historico
        $release = new HistoricoAtualizacao();
        $release->saveRelease();

        \Session::flash('mensagem_sucesso', 'Ciclo excluído com sucesso.');

        return Redirect::to('ciclos/lista');
    }

    public function buscar(Request $request)
    {
        $filtro = $request->get('buscar');
        $ciclos = DB::table('ciclos')
                        ->where('descricao', 'like', '%'.$filtro.'%')
                        ->paginate(10);
        $links = $ciclos->links();

        return view('ciclos.lista', ['ciclos' => $ciclos, 'links' => $links]);
    }

    public function detailsCiclo($id)
    {
        $ciclo = Ciclo::findOrFail($id);
        $params = ['ciclo' => $ciclo];
        return view('ciclos.details', $params);
    }

    public function disableEnableCiclo($id)
    {
        $ciclo = Ciclo::findOrFail($id);
        $mensagem = '';

        if(is_null($ciclo->status) || $ciclo->status == 'A')
        {
            $ciclo->status = 'I';
            $mensagem = 'Ciclo desativado com sucesso';
        }
        else
        {
            $ciclo->status = 'A';
            $mensagem = 'Ciclo reativado com sucesso';
        }

        $ciclo->update();

        // save release
        $release = new HistoricoAtualizacao();
        $release->saveRelease();

        \Session::flash('mensagem_sucesso', $mensagem);

        return Redirect::to('ciclos/lista');
    }

    public function arrayCiclos()
    {

        $ciclos_table = Ciclo::get();
        $ciclos = array();
        
        foreach($ciclos_table as $ciclo)
        {
            array_push($ciclos, $ciclo);
        }

        return $ciclos;
    }

    public function getJson()
    {
        $ciclos = DB::table('ciclos')->get();

        return response()->json($ciclos);
    }
}
