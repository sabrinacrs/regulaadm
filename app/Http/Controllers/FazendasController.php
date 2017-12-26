<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FazendasController extends Controller
{
    protected $fazenda = null;

    public function __construct(Fazenda $fazenda)
    {
        $this->fazenda = $fazenda;
    }

    public function index()
    {
        return $this->listFazendas();
    }

    public function allFazendas()
    {
        return Response::json($this->fazenda->allFazendas(), 200);
    }

    public function getFazenda($id)
    {
        $fazenda = $this->fazenda->getFazenda($id);

        if(!$fazenda)
            return Response::json(['response' => 'Fazenda não encontrada'], 400);

        return Response::json($fazenda, 200);
    }

    public function saveFazenda()
    {
        return Response::json($this->fazenda->saveFazenda(), 201);
    }

    public function updateFazenda($id)
    {
        $fazenda = $this->fazenda->updateFazenda($id);

        if(!$fazenda)
            return Response::json(['response' => 'Fazenda não encontrada'], 400);

        return Response::json($fazenda, 200);
    }

    public function deleteFazenda($id)
    {
        $fazenda = $this->fazenda->deleteFazenda($id);

        if(!$fazenda)
            return Response::json(['response' => 'Fazenda não encontrada'], 400);

        return Response::json(['response' => 'Fazenda removida com sucesso!'], 200);
    }
}
