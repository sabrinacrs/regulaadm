<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\HistoricoAtualizacao;
use App\EpocasSemeadura;
use Redirect;
use DB;

class EpocasSemeaduraController extends Controller
{
    public function index()
    {
        $epocas_semeadura = $this->arrayEpocaSemeaduras();
        return view('epocas_semeadura.principal');
    }

    public function lista()
    {
        $epocas_semeadura = DB::table('epocassemeaduras')->paginate(5);
        $links = $epocas_semeadura->links();
        return view('epocas_semeadura.lista', ['epocas_semeadura'=>$epocas_semeadura, 'links'=>$links]);
    }

    public function salvar(Request $request)
    {
        $epoca_semeadura = new EpocasSemeadura();
        $epoca_semeadura = $epoca_semeadura->create($request->all());

        \Session::flash('mensagem_sucesso', 'Época de Semeadura cadastrada com sucesso.');

        // insere alteração no historico
        $release = new HistoricoAtualizacao();
        $release->saveRelease();

        if($request->is('epocas_semeadura/salvar'))
            return Redirect::to('epocas_semeadura');
        else
            return Redirect::to('epocas_semeadura/lista/nova');
    }

    public function nova(Request $request)
    {
        $epocas_semeadura = DB::table('epocassemeaduras')->paginate(5);
        $links = $epocas_semeadura->links();
        return view('epocas_semeadura.lista', ['epocas_semeadura'=>$epocas_semeadura, 'links'=>$links]);
    }

    public function editar($id)
    {
        $epocas_semeadura = DB::table('epocassemeaduras')->paginate(5);
        $links = $epocas_semeadura->links();
        $epoca_semeadura = EpocasSemeadura::findOrFail($id);
        return view('epocas_semeadura.lista', ['epocas_semeadura'=>$epocas_semeadura, 'epoca_semeadura'=>$epoca_semeadura, 'links'=>$links]);
    }

    public function atualizar($id, Request $request)
    {
        $epocas_semeadura = $this->arrayEpocaSemeaduras();
        $epoca_semeadura = EpocasSemeadura::findOrFail($id);
        $epoca_semeadura->update($request->all());

        \Session::flash('mensagem_sucesso', 'Época de Semeadura atualizada com sucesso.');

        // insere alteração no historico
        $release = new HistoricoAtualizacao();
        $release->saveRelease();

        return Redirect::to('epocas_semeadura/lista/'.$epoca_semeadura->id.'/editar');
    }

    public function excluir($id)
    {
        $epoca_semeadura = EpocasSemeadura::findOrFail($id);
        $epoca_semeadura->delete();

        \Session::flash('mensagem_sucesso', 'Época de Semeadura excluída com sucesso.');

        // insere alteração no historico
        $release = new HistoricoAtualizacao();
        $release->saveRelease();

        return Redirect::to('epocas_semeadura/lista');
    }

    public function buscar(Request $request)
    {
        $filtro = $request->get('buscar');
        $epocas_semeadura = DB::table('epocassemeaduras')
                        ->where('descricao', 'like', '%'.$filtro.'%')
                        ->paginate(5);
        $links = $epocas_semeadura->links();
        return view('epocas_semeadura.lista', ['epocas_semeadura'=>$epocas_semeadura, 'links' => $links]);
    }

    public function arrayEpocaSemeaduras()
    {
        $epocas_semeadura_table = EpocasSemeadura::get();
        $epocas_semeadura = array();

        foreach($epocas_semeadura_table as $epoca_semeadura)
        {
            array_push($epocas_semeadura, $epoca_semeadura);
        }

        return $epocas_semeadura;
    }

    public function disableEnableEpocaSemeadura($id)
    {
        $epoca = EpocasSemeadura::findOrFail($id);
        $mensagem = '';

        if(is_null($epoca->status) || $epoca->status == 'A')
        {
            $epoca->status = 'I';
            $mensagem = 'Época desativada com sucesso';
        }
        else
        {
            $epoca->status = 'A';
            $mensagem = 'Época reativada com sucesso';
        }

        $epoca->update();

        // save release
        $release = new HistoricoAtualizacao();
        $release->saveRelease();

        \Session::flash('mensagem_sucesso', $mensagem);

        return Redirect::to('epocas_semeadura/lista');
    }

    public function detailsEpocaSemeadura($id)
    {
        $epoca_semeadura = EpocasSemeadura::findOrFail($id);
        $params = ['epoca_semeadura' => $epoca_semeadura];
        return view('epocas_semeadura.details', $params);
    }

    public function getJson()
    {
        $epocassemeaduras = DB::table('epocassemeaduras')->get();
        return response()->json($epocassemeaduras);
    }
}
