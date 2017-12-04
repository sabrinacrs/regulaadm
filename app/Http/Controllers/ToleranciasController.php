<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\HistoricoAtualizacao;
use App\Tolerancia;
use Redirect;
use DB;

class ToleranciasController extends Controller
{
    public function index()
    {
        $tolerancias = $this->arrayTolerancias();
        return view('tolerancias.principal');
    }

    public function lista()
    {
        // $tolerancias = $this->arrayTolerancias();
        $tolerancias = DB::table('tolerancias')->paginate(10);
        $links = $tolerancias->links();
        return view('tolerancias.lista', ['tolerancias' => $tolerancias, 'links'=>$links]);
    }

    public function salvar(Request $request)
    {
        $tolerancia = new Tolerancia();
        $tolerancia = $tolerancia->create($request->all());

        \Session::flash('mensagem_sucesso', 'Tolerância cadastrada com sucesso.');

        // insere alteração no historico
        $release = new HistoricoAtualizacao();
        $release->saveRelease();

        if($request->is('tolerancias/salvar'))
            return Redirect::to('tolerancias');
        else
            return Redirect::to('tolerancias/lista/nova');
    }

    public function nova(Request $request)
    {
        $tolerancias = DB::table('tolerancias')->paginate(10);
        $links = $tolerancias->links();
        return view('tolerancias.lista', ['tolerancias'=>$tolerancias, 'links'=>$links]);
    }

    public function editar($id)
    {
        $tolerancias = DB::table('tolerancias')->paginate(10);
        $tolerancia = Tolerancia::findOrFail($id);
        $links = $tolerancias->links();
        return view('tolerancias.lista', ['tolerancias'=>$tolerancias, 'tolerancia' => $tolerancia, 'links'=>$links]);
    }

    public function atualizar($id, Request $request)
    {
        $tolerancias = $this->arrayTolerancias();
        $tolerancia = Tolerancia::findOrFail($id);
        $tolerancia->update($request->all());

        \Session::flash('mensagem_sucesso', 'Tolerância atualizada com sucesso.');

        // insere alteração no historico
        $release = new HistoricoAtualizacao();
        $release->saveRelease();

        return Redirect::to('tolerancias/lista/'.$tolerancia->id.'/editar');
    }

    public function excluir($id)
    {
        $tolerancia = Tolerancia::findOrFail($id);
        $tolerancia->delete();

        \Session::flash('mensagem_sucesso', 'Tolerância excluída com sucesso.');

        // insere alteração no historico
        $release = new HistoricoAtualizacao();
        $release->saveRelease();

        return Redirect::to('tolerancias/lista');
    }

    public function buscar(Request $request)
    {
        $filtro = $request->get('buscar');
        $tolerancias = DB::table('tolerancias')
                    ->where('descricao', 'like', '%'.$filtro.'%')
                    ->paginate(10);
        $links = $tolerancias->links();
        return view('tolerancias.lista', ['tolerancias' => $tolerancias, 'links'=>$links]);
    }

    public function arrayTolerancias()
    {
        $tolerancias_table = Tolerancia::get();
        $tolerancias = array();

        foreach($tolerancias_table as $tolerancia)
        {
            array_push($tolerancias, $tolerancia);
        }

        return $tolerancias;
    }

    public function disableEnableTolerancia($id)
    {
        $tolerancia = Tolerancia::findOrFail($id);
        $mensagem = '';

        if(is_null($tolerancia->status) || $tolerancia->status == 'A')
        {
            $tolerancia->status = 'I';
            $mensagem = 'Tolerância desativada com sucesso';
        }
        else
        {
            $tolerancia->status = 'A';
            $mensagem = 'Tolerância reativada com sucesso';
        }

        $tolerancia->update();

        // save release
        $release = new HistoricoAtualizacao();
        $release->saveRelease();

        \Session::flash('mensagem_sucesso', $mensagem);

        return Redirect::to('tolerancias/lista');
    }

    public function detailsTolerancia($id)
    {
        $tolerancia = Tolerancia::findOrFail($id);
        $params = ['tolerancia' => $tolerancia];
        return view('tolerancias.details', $params);
    }

    public function getJson()
    {
        $tolerancias = DB::table('tolerancias')->get();
        return response()->json($tolerancias);
    }
}
