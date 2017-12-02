<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\HistoricoAtualizacao;
use App\Doenca;
use Redirect;
use DB;

class DoencasController extends Controller
{
    public function index()
    {
        $doencas = DB::table('doencas')->paginate(5); //get();//$this->arrayDoencas();
        $links = $doencas->links();
        return view('doencas.busca', ['doencas'=>$doencas, 'links'=>$links]);
    }

    public function lista()
    {
        $doencas = DB::table('doencas')->paginate(5);
        $links = $doencas->links();
        return view('doencas.lista', ['doencas'=>$doencas, 'links'=>$links]);
    }

    public function salvar(Request $request)
    {
        $doenca = new Doenca();
        $doenca = $doenca->create($request->all());

        \Session::flash('mensagem_sucesso', 'Doença cadastrada com sucesso.');

        // insere alteração no historico
        $release = new HistoricoAtualizacao();
        $release->saveRelease();

        if($request->is('doencas/salvar'))
            return Redirect::to('doencas');
        else
            return Redirect::to('doencas/lista/nova');
    }

    public function nova(Request $request)
    {
        $doencas = DB::table('doencas')->paginate(5);
        $links = $doencas->links();

        return view('doencas.lista', ['doencas'=>$doencas, 'links'=>$links]);
    }

    public function editar($id)
    {
        $doencas = DB::table('doencas')->paginate(5);
        $doenca = Doenca::findOrFail($id);
        $links = $doencas->links();

        return view('doencas.lista', ['doencas'=>$doencas, 'doenca'=>$doenca, 'links'=>$links]);
    }

    public function atualizar($id, Request $request)
    {
        $doencas = $this->arrayDoencas();
        $doenca = Doenca::findOrFail($id);
        $doenca->update($request->all());

        // insere alteração no historico
        $release = new HistoricoAtualizacao();
        $release->saveRelease();

        \Session::flash('mensagem_sucesso', 'Doença atualizada com sucesso');

        return Redirect::to('doencas/lista/'.$doenca->id.'/editar');
    }

    public function excluir($id)
    {
        $doenca = Doenca::findOrFail($id);
        $doenca->delete();

        // insere alteração no historico
        $release = new HistoricoAtualizacao();
        $release->saveRelease();

        \Session::flash('mensagem_sucesso', 'Doença excluída com sucesso');

        return Redirect::to('doencas/lista');
    }

    public function buscar(Request $request)
    {
        $filtro = $request->get('buscar');
        $doencas = DB::table('doencas')
                        ->where(['descricao', 'like', '%'.$filtro.'%'])
                        ->paginate(5);
        $links = $doencas->links();

        return view('doencas.lista', ['doencas'=>$doencas, 'links'=>$links]);
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

    public function disableEnableDoenca($id)
    {
        $doenca = Doenca::findOrFail($id);
        $mensagem = '';

        if(is_null($doenca->status) || $doenca->status == 'A')
        {
            $doenca->status = 'I';
            $mensagem = 'Doença desativada com sucesso';
        }
        else
        {
            $doenca->status = 'A';
            $mensagem = 'Doença reativada com sucesso';
        }

        $doenca->update();

        // save release
        $release = new HistoricoAtualizacao();
        $release->saveRelease();

        \Session::flash('mensagem_sucesso', $mensagem);

        return Redirect::to('doencas/lista');
    }

    public function detailsDoenca($id)
    {
        $doenca = Doenca::findOrFail($id);
        $params = ['doenca' => $doenca];
        return view('doencas.details', $params);
    }

    public function getJson()
    {
        $doencas = DB::table('doencas')->get();

        return response()->json($doencas);
    }

}
