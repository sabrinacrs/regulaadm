<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Administrador;
use Redirect;
use Crypt;
use DB;

class AdministradoresController extends Controller
{
    public function index()
    {        
        $administradores = $this->arrayAdministradores()->paginate(10);
        $links = $administradores->links();

        $parameters = [
            'administradores' => $administradores,
            'links' => $links
        ];
        
        return view('administradores.lista', $parameters);
    }

    public function novo()
    {
        return view('administradores/registrar');
    }

    public function lista()
    {
        $administradores = DB::table('users')->paginate(10);
        $links = $administradores->links();

        $parameters = [
            'administradores' => $administradores,
            'links' => $links
        ];

        return view('administradores.lista', $parameters);
    }

    public function salvar(Request $request)
    {
        $administrador = new User();
        $query = [
                  '_token' => $request->get('_token'),
                  'name' => $request->input('name'),
                  'email' => $request->input('email'),
                  'status' => 'A',
                  'password' => bcrypt($request->input('password'))
                ];
        $administrador = $administrador->create($query);

        \Session::flash('mensagem_sucesso', 'Administrador cadastrado com sucesso.');

        if($request->is('administradores/salvar'))
            return Redirect::to('administradores/registrar');
    }

    public function excluir($id)
    {
        $administrador = Administrador::findOrFail($id);
        $administrador->delete();
  
        \Session::flash('mensagem_sucesso', 'Administrador excluído com sucesso');
  
        return Redirect::to('administradores/lista');
    }

    public function buscar(Request $request)
    {
        $filtro = $request->get('buscar');
        $administradores = DB::table('users')
                            ->where('name', 'like', '%'.$filtro.'%')
                            ->paginate(10);
        $links = $administradores->links();

        return view('administradores.lista', ['administradores' => $administradores, 'links' => $links]);
    }

    public function detailsAdministrador($id)
    {
        $administrador = Administrador::findOrFail($id);
        $params = ['administrador' => $administrador];
        return view('administradores.details', $params);
    }

    public function disableEnableAdministrador($id)
    {
        $administrador = Administrador::findOrFail($id);
        $mensagem = '';

        if(is_null($administrador->status) || $administrador->status == 'A')
        {
            $administrador->status = 'I';
            $mensagem = 'A conta do administrador foi desativada com sucesso';
        }
        else
        {
            $administrador->status = 'A';
            $mensagem = 'A conta do administrador foi reativada com sucesso';
        }

        $administrador->update();

        \Session::flash('mensagem_sucesso', $mensagem);

        return Redirect::to('administradores/lista');
    }

    public function arrayAdministradores()
    {
        $administradores = User::get();
        return $administradores;
    }
}
