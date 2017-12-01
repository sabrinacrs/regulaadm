<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Empresa;
use Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresaTable = Empresa::get();

        //var_dump($empresaTable);
        if(sizeof($empresaTable) <= 0) {
          $empresa = new Empresa();
          $empresa->id = -1;

          return Redirect::to('parametrizacao/nova');
        }
        else {
          return view('home');
        }
    }

    public function parametrizacao()
    {
        $empresa = new Empresa();
        $empresa->id = -1;

        return view('parametrizacao.principal', ['empresa'=>$empresa]);
    }
}
