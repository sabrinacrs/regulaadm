<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
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
        $ciclos = DB::table('ciclos')->where('status', '<>', 'I')->paginate(5);
        $links = $ciclos->links();

        return view('ciclos.lista', ['ciclos' => $ciclos, 'links' => $links]);
    }

    public function salvar(Request $request)
    {
        $ciclo = new Ciclo();
        $ciclo = $ciclo->create($request->all());

        \Session::flash('mensagem_sucesso', 'Ciclo cadastrado com sucesso.');

        if($request->is('ciclos/salvar'))
            return Redirect::to('ciclos');
        else
            return Redirect::to('ciclos/lista/novo');
    }

    public function novo(Request $request)
    {
        $ciclos = DB::table('ciclos')->where('status', '<>', 'I')->paginate(5);
        $links = $ciclos->links();

        return view('ciclos.lista', ['ciclos'=>$ciclos, 'links'=>$links]);
    }

    public function editar($id)
    {
        $ciclos = DB::table('ciclos')->where('status', '<>', 'I')->paginate(5);
        $links = $ciclos->links();
        $ciclo = Ciclo::findOrFail($id);

        return view('ciclos.lista', ['ciclos'=>$ciclos, 'ciclo' => $ciclo, 'links'=>$links]);
    }

    public function atualizar($id, Request $request)
    {
        $ciclos = $this->arrayCiclos();
        $ciclo = Ciclo::findOrFail($id);
        $ciclo->update($request->all());

        \Session::flash('mensagem_sucesso', 'Ciclo atualizado com sucesso.');

        return Redirect::to('ciclos/lista/'.$ciclo->id.'/editar');
    }

    public function excluir($id)
    {
        $ciclo = Ciclo::findOrFail($id);
        $ciclo->status = 'I';
        $ciclo->update();

        \Session::flash('mensagem_sucesso', 'Ciclo excluído com sucesso.');

        return Redirect::to('ciclos/lista');
    }

    public function buscar(Request $request)
    {
        $filtro = $request->get('buscar');
        $ciclos = DB::table('ciclos')
                        ->where([
                        ['descricao', 'like', '%'.$filtro.'%'],
                        ['status', '<>', 'I']
                        ])->paginate(5);
        $links = $ciclos->links();

        return view('ciclos.lista', ['ciclos' => $ciclos, 'links' => $links]);
    }

    public function detailsCiclo($id)
    {
        $ciclo = Ciclo::findOrFail($id);
        $params = ['ciclo' => $ciclo];
        return view('ciclos.details', $params);
    }

    public function arrayCiclos()
    {

        $ciclos_table = Ciclo::get();
        $ciclos = array();
        
        foreach($ciclos_table as $ciclo)
        {
            if($ciclo->status != 'I')
            array_push($ciclos, $ciclo);
        }

        return $ciclos;
    }

    public function getJson()
    {
        $ciclos = DB::table('ciclos')->where('status', '<>', 'I')->get();

        return response()->json($ciclos);
    }
}
