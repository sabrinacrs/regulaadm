<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Redirect;
use Crypt;
use DB;

class AdministradoresController extends Controller
{
    public function index()
    {
        $administradores = $this->arrayAdministradores();
        return view('administradores.lista', ['administradores' => $administradores]);
    }

    public function novo()
    {
        return view('administradores/registrar');
    }

    public function lista()
    {
        $administradores = $this->arrayAdministradores();
        return view('administradores.lista', ['administradores' => $administradores]);
    }

    public function salvar(Request $request)
    {
        $administrador = new User();

        $query = [
                  '_token' => $request->get('_token'),
                  'name' => $request->input('name'),
                  'email' => $request->input('email'),
                  'password' => bcrypt($request->input('password'))
                ];

        $administrador = $administrador->create($query);

        \Session::flash('mensagem_sucesso', 'Administrador cadastrado com sucesso.');

        if($request->is('administradores/salvar'))
          return Redirect::to('administradores/registrar');
    }

    public function buscar(Request $request)
    {
        $filtro = $request->get('buscar');
        $administradores = DB::table('users')
                      ->where([
                        ['name', 'like', '%'.$filtro.'%'],
                      ])->get();

        return view('administradores.lista', ['administradores' => $administradores]);
    }

    public function arrayAdministradores()
    {
        $administradores = User::get();

        return $administradores;
    }
}
