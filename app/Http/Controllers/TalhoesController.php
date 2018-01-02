<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Talhao;
use Redirect;
use Response;
use DB;

class TalhoesController extends Controller
{
    protected $talhao = null;

    public function __construct(Talhao $talhao)
    {
        $this->talhao = $talhao;
    }

    public function index()
    {
        return $this->listTalhoes();
    }

    public function allTalhoes()
    {
        return Response::json($this->talhao->allTalhoes(), 200);
    }

    public function getTalhao($id)
    {
        $talhao = $this->talhao->getTalhao($id);

        if(!$talhao)
            return Response::json(['response' => 'Talhão não encontrado'], 400);

        return Response::json($talhao, 200);
    }

    public function getTalhoesByCliente($clienteId)
    {
        $talhoes = $this->talhao->getTalhoesByCliente($clienteId);

        if(!$talhoes)
            return Response::json(['response' => 'Talhão não encontrado'], 400);

        return Response::json($talhoes, 200);
    }

    public function saveTalhao()
    {
        return Response::json($this->talhao->saveTalhao(), 201);
    }

    public function updateTalhao($id)
    {
        $talhao = $this->talhao->updateTalhao($id);

        if(!$talhao)
            return Response::json(['response' => 'Talhão não encontrado'], 400);

        return Response::json($talhao, 200);
    }

    public function deleteTalhao($id)
    {
        $talhao = $this->talhao->deleteTalhao($id);

        if(!$talhao)
            return Response::json(['response' => 'Talhão não encontrado'], 400);

        return Response::json(['response' => 'Talhão removido com sucesso!'], 200);
    }
}
