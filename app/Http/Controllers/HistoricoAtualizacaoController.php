<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\HistoricoAtualizacao;
use DB;

class HistoricoAtualizacaoController extends Controller
{
    //
    public function index()
    {
        return view('release_database.release');
    }

    public function newUpdate($adm)
    {
        // insere no historico atualizacao que fez modificação

        // // data
        // $mytime = Carbon\Carbon::now();

        // // novo cultivar
        // $release = new HistoricoAtualizacao();
        // $release->data_atualizacao = $mytime->toDateTimeString();
        // $release->status = 'I';
        // $release->adm_id = "";

        // get user id 
        // $id = Auth::user()->id;
        // $currentuser = User::find($id);
    }

    public function newRelease()
    {
        // habilita a atualização para o usuário;
        $mytime = \Carbon\Carbon::now();

        // todas as atualizações do dia, que estão com status I, ficam com status D      
        // echo $mytime->toDateString();  
        HistoricoAtualizacao::where('data_atualizacao', $mytime->toDateString())
                            ->where('status', 'I')
                            ->update(['status' => 'D']);

        // mensagem de sucesso
        \Session::flash('mensagem_sucesso', 'As atualizações foram disponibilizadas com sucesso.');

        return view('home');
    }

    public function getJsonReleasesDisponiveis()
    {
        $releases = DB::table('historico_atualizacao')->where('status', '<>', 'I')->get();

        return response()->json($releases);
    }

    public function getJsonLastRelease()
    {
        $lastRelease = DB::table('historico_atualizacao')
                        ->where('status', 'D')
                        ->orderBy('data_atualizacao', 'desc')
                        ->first();

        return response()->json($lastRelease);
    }
}
