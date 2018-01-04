<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Semeadura;
use Redirect;
use Response;
use DB;

class SemeadurasController extends Controller
{
    protected $semeadura = null;

    public function __construct(Semeadura $semeadura)
    {
        $this->semeadura = $semeadura;
    }

    // public function index()
    // {
    //     return $this->listSemeaduras();
    // }

    public function allSemeaduras()
    {
        return Response::json($this->semeadura->allSemeaduras(), 200);
    }

    public function getSemeadura($id)
    {
        $semeadura = $this->semeadura->getSemeadura($id);

        if(!$semeadura)
          return Response::json(['response' => 'Semeadura não encontrada'], 400);

        return Response::json($semeadura, 200);
    }

    public function getSemeadurasByCliente($clienteId)
    {
        $semeaduras = $this->semeadura->getSemeadurasByCliente($clienteId);

        if(!$semeaduras)
            return Response::json(['response' => 'Nenhuma semeadura encontrada'], 400);

        return Response::json($semeaduras, 200);
    }

    public function saveSemeadura()
    {
        return Response::json($this->semeadura->saveSemeadura(), 201);
    }

    public function updateSemeadura($id)
    {
      $semeadura = $this->semeadura->updateSemeadura($id);

      if(!$semeadura)
        return Response::json(['response' => 'Semeadura não encontrada'], 400);

      return Response::json($semeadura, 200);
    }

    public function deleteSemeadura($id)
    {
        $semeadura = $this->semeadura->deleteSemeadura($id);

        if(!$semeadura)
          return Response::json(['response' => 'Semeadura não encontrada'], 400);

        return Response::json(['response' => 'Semeadura removido com sucesso!'], 200);
    }

    // public function listSemeaduras()
    // {
    //     $semeaduras = DB::table('semeaduras')
    //                   ->orderBy('status')
    //                   ->paginate(20);
    //     $links = $semeaduras->links();
    //
    //     $params = [
    //       'semeaduras' => $semeaduras,
    //       'links' => $links,
    //     ];
    //
    //     return view('semeaduras.lista', $params);
    // }
}
