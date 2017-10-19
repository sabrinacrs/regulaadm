<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Doenca;
use Redirect;
use DB;

class DoencasController extends Controller
{
  public function index()
  {
      $doencas = DB::table('doencas')->where('status', '<>', 'I')->paginate(5); //get();//$this->arrayDoencas();
      $links = $doencas->links();

      return view('doencas.busca', ['doencas'=>$doencas, 'links'=>$links]);
  }

  public function lista()
  {
      $doencas = DB::table('doencas')->where('status', '<>', 'I')->paginate(5);
      $links = $doencas->links();

      return view('doencas.lista', ['doencas'=>$doencas, 'links'=>$links]);
  }

  public function salvar(Request $request)
  {
      $doenca = new Doenca();
      $doenca = $doenca->create($request->all());

      \Session::flash('mensagem_sucesso', 'Doença cadastrada com sucesso.');

      if($request->is('doencas/salvar'))
        return Redirect::to('doencas');
      else
        return Redirect::to('doencas/lista/nova');
  }

  public function nova(Request $request)
  {
      $doencas = DB::table('doencas')->where('status', '<>', 'I')->paginate(5);
      $links = $doencas->links();

      return view('doencas.lista', ['doencas'=>$doencas, 'links'=>$links]);
  }

  public function editar($id)
  {
      $doencas = DB::table('doencas')->where('status', '<>', 'I')->paginate(5);
      $doenca = Doenca::findOrFail($id);
      $links = $doencas->links();

      //redirect()->back()->withInput();
      return view('doencas.lista', ['doencas'=>$doencas, 'doenca'=>$doenca, 'links'=>$links]);
  }

  public function atualizar($id, Request $request)
  {
      $doencas = $this->arrayDoencas();
      $doenca = Doenca::findOrFail($id);
      $doenca->update($request->all());

      \Session::flash('mensagem_sucesso', 'Doença atualizada com sucesso');

      return Redirect::to('doencas/lista/'.$doenca->id.'/editar');
  }

  public function excluir($id)
  {
      $doenca = Doenca::findOrFail($id);
      $doenca->status = 'I';
      $doenca->update();

      \Session::flash('mensagem_sucesso', 'Doença excluída com sucesso');

      return Redirect::to('doencas/lista');
  }

  public function buscar(Request $request)
  {
      $filtro = $request->get('buscar');
      $doencas = DB::table('doencas')
                    ->where([
                      ['descricao', 'like', '%'.$filtro.'%'],
                      ['status', '<>', 'I']
                    ])->paginate(5);
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

}
