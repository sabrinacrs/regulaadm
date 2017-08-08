<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresaTable = Empresa::get();
        $empresa = new Empresa();

        if(sizeof($empresaTable) > 0)
        {
            foreach ($empresaTable as $key => $value) {
              $empresa = $value;
            }
        }
        else
          $empresa->id = -1;

        return view('parametrizacao.principal', ['empresa' => $empresa]);
    }

    public function salvar(Request $request)
    {
        $empresa = new Empresa();

        if ($request->hasFile('logo')) //
        {
            $imageOriginalName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $request->file('logo')->getClientOriginalName());
            $imageName = $request->input('nome').'_'.$imageOriginalName.'_logo'.'.'.$request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(base_path()."\\public\images\catalog\\", $imageName);

            $pathLogo = "images\catalog\\".$imageName;

            $query = [
              'nome' => $request->input('nome'),
              'razao_social' => $request->input('razao_social'),
              'ramo_atividade' => $request->input('ramo_atividade'),
              'cnpj' => $request->input('cnpj'),
              'email' => $request->input('email'),
              'site' => $request->input('site'),
              'telefone' => $request->input('telefone'),
              'rua' => $request->input('rua'),
              'bairro' => $request->input('bairro'),
              'numero' => $request->input('numero'),
              'cidade' => $request->input('cidade'),
              'cep' => $request->input('cep'),
              'uf' => $request->get('selectUF'),
              'logo' => $pathLogo
            ];

            $empresa = $empresa->create($query);

            \Session::flash('mensagem_sucesso', 'Empresa registrada com sucesso.');

            return view('parametrizacao.principal', ['empresa' => $empresa]);
        }
        else {
          echo "Selecione uma imagem";
        }
    }

    public function atualizar(Request $request)
    {
        $empresaEdit = new Empresa();
        $empresa = Empresa::orderBy('id', 'desc')->first();

        if ($request->hasFile('logo')) //
        {
          $imageOriginalName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $request->file('logo')->getClientOriginalName());
          $imageName = $request->input('nome').'_'.$imageOriginalName.'_logo'.'.'.$request->file('logo')->getClientOriginalExtension();
          $request->file('logo')->move(base_path()."\\public\images\catalog\\", $imageName);

          $pathLogo = "images\catalog\\".$imageName;
        }
        else {
          $pathLogo = $empresa->logo;
        }

        $query = [
          'nome' => $request->input('nome'),
          'razao_social' => $request->input('razao_social'),
          'ramo_atividade' => $request->input('ramo_atividade'),
          'cnpj' => $request->input('cnpj'),
          'email' => $request->input('email'),
          'site' => $request->input('site'),
          'telefone' => $request->input('telefone'),
          'rua' => $request->input('rua'),
          'bairro' => $request->input('bairro'),
          'numero' => $request->input('numero'),
          'cidade' => $request->input('cidade'),
          'cep' => $request->input('cep'),
          'uf' => $request->get('selectUF'),
          'logo' => $pathLogo
        ];

        $empresa->update($query);

        \Session::flash('mensagem_sucesso', 'Empresa registrada com sucesso.');

        return view('parametrizacao.principal', ['empresa' => $empresa]);
    }
}
