<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cliente;
use Redirect;
use Response;
use DB;

class ClientesController extends Controller
{
    protected $cliente = null;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index()
    {
        return $this->listClientes();
    }

    public function allClientes()
    {
        return Response::json($this->cliente->allClientes(), 200);
    }

    public function getCliente($id)
    {
        $cliente = $this->cliente->getCliente($id);

        if(!$cliente)
          return Response::json(['response' => 'Cliente não encontrado'], 400);

        return Response::json($cliente, 200);
    }

    public function saveCliente()
    {
        return Response::json($this->cliente->saveCliente(), 201);
        // return $this->cliente->saveCliente();
    }

    public function updateCliente($id)
    {
      $cliente = $this->cliente->updateCliente($id);

      if(!$cliente)
        return Response::json(['response' => 'Cliente não encontrado'], 400);

      return Response::json($cliente, 200);
    }

    public function deleteCliente($id)
    {
        $cliente = $this->cliente->deleteCliente($id);

        if(!$cliente)
          return Response::json(['response' => 'Cliente não encontrado'], 400);

        return Response::json(['response' => 'Cliente removido com sucesso!'], 200);
    }

    // Methods for Adm
    public function disableEnableCliente($id)
    {
        $cliente = Cliente::findOrFail($id);
        $mensagem = '';

        if(is_null($cliente->status) || $cliente->status == 'A')
        {
            $cliente->status = 'IA';
            $mensagem = 'A conta do cliente foi desativada com sucesso';
        }
        else
        {
            $cliente->status = 'A';
            $mensagem = 'A conta do cliente foi reativada com sucesso';
        }

        $cliente->update();

        \Session::flash('mensagem_sucesso', $mensagem);

        return Redirect::to('clientes/lista');
    }

    public function listClientes()
    {
        $clientes = DB::table('clientes')
                      ->orderBy('status')
                      ->paginate(20);
        $links = $clientes->links();

        $params = [
          'clientes' => $clientes,
          'links' => $links,
        ];

        return view('clientes.lista', $params);
    }

    public function search(Request $request)
    {
        $filtro = $request->get('filter');

        if(is_null($filtro))
          return $this->listClientes();

        $clientes = DB::table('clientes')
                    ->where('nome', 'like', '%'.$filtro.'%')
                    ->orderBy('status')
                    ->paginate(20);
        $links = $clientes->links();
        $params = [
          'clientes' => $clientes,
          'links' => $links,
        ];

        return view('clientes.lista', $params);
    }

    public function admDeleteCliente($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        \Session::flash('mensagem_sucesso', 'Todos os dados do cliente foram excluídos com sucesso');

        return Redirect::to('clientes/lista');
    }
}
