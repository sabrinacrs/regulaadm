<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Empresa;
use Redirect;

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
        $empresa->id = -1;

        if ($request->hasFile('logo')) //
        {
            $imageOriginalName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $request->file('logo')->getClientOriginalName());
            $imageName = $request->input('nome').'_'.$imageOriginalName.'_logo'.'.'.$request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(base_path()."\\public\img\catalog\\", $imageName);

            $pathLogo = "img\catalog\\".$imageName;

            if($this->canSave($request, $empresa))
            {
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

                return view('welcome');
            }
            else {
              return view('parametrizacao.principal', ['empresa' => $empresa]);
            }
        }
        else {
          \Session::flash('mensagem_falha', 'Selecione uma imagem');

          return view('parametrizacao.principal', ['empresa' => $empresa]);
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
            $request->file('logo')->move(base_path()."\\public\img\catalog\\", $imageName);

            $pathLogo = "img\catalog\\".$imageName;
        }
        else {
            $pathLogo = $empresa->logo;
        }

        if($this->canSave($request, $empresa))
        {
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
        else {
          return view('parametrizacao.principal', ['empresa' => $empresa]);
        }

    }

    private function canSave($request, $empresa)
    {
        $validaCNPJ = $this->cnpjIsValid($request->input('cnpj'));
        if(($this->cnpjIsValid($request->input('cnpj'))) == false)
        {
            echo "entrou";
            \Session::flash('mensagem_falha', 'CNPJ inválido');
            //Redirect::back();
            //$empresa->id = -1;
            //return view('parametrizacao.principal', ['empresa' => $empresa]);
        }
        else if(!preg_match('/^[0-9]{5,5}([- ]?[0-9]{3,3})?$/', $request->input('cep')))
        {
            \Session::flash('mensagem_falha', 'CEP inválido');
            return false;
            //Redirect::back();
            //return view('parametrizacao.principal', ['empresa' => $empresa]);
        }
        else if(!preg_match('^\(+[0-9]{2,3}\) [0-9]{4}-[0-9]{4}$^', $request->input('telefone')))
        {
            \Session::flash('mensagem_falha', 'Telefone inválido');
            return false;
            //Redirect::back();
            //return view('parametrizacao.principal', ['empresa' => $empresa]);
        }
        else {
          return true;
        }
    }

    private function cnpjIsValid($cnpj)
    {
        $cnpj = str_replace('/', '', $cnpj);
        $cnpj = str_replace('.', '', $cnpj);
        $cnpj = str_replace('-', '', $cnpj);

        if (strlen($cnpj) <> 14)
         return false;

        $soma = 0;

        $soma += ($cnpj[0] * 5);
        $soma += ($cnpj[1] * 4);
        $soma += ($cnpj[2] * 3);
        $soma += ($cnpj[3] * 2);
        $soma += ($cnpj[4] * 9);
        $soma += ($cnpj[5] * 8);
        $soma += ($cnpj[6] * 7);
        $soma += ($cnpj[7] * 6);
        $soma += ($cnpj[8] * 5);
        $soma += ($cnpj[9] * 4);
        $soma += ($cnpj[10] * 3);
        $soma += ($cnpj[11] * 2);

        $d1 = $soma % 11;
        $d1 = $d1 < 2 ? 0 : 11 - $d1;

        $soma = 0;
        $soma += ($cnpj[0] * 6);
        $soma += ($cnpj[1] * 5);
        $soma += ($cnpj[2] * 4);
        $soma += ($cnpj[3] * 3);
        $soma += ($cnpj[4] * 2);
        $soma += ($cnpj[5] * 9);
        $soma += ($cnpj[6] * 8);
        $soma += ($cnpj[7] * 7);
        $soma += ($cnpj[8] * 6);
        $soma += ($cnpj[9] * 5);
        $soma += ($cnpj[10] * 4);
        $soma += ($cnpj[11] * 3);
        $soma += ($cnpj[12] * 2);


        $d2 = $soma % 11;
        $d2 = $d2 < 2 ? 0 : 11 - $d2;

        if ($cnpj[12] == $d1 && $cnpj[13] == $d2) {
           return true;
        }
        else {
           return false;
        }
        // $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        // // Valida tamanho
        // if (strlen($cnpj) != 14)
        //   return false;
        // // Valida primeiro dígito verificador
        // for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
        // {
        //   $soma += $cnpj{$i} * $j;
        //   $j = ($j == 2) ? 9 : $j - 1;
        // }
        // $resto = $soma % 11;
        // if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
        //   return false;
        // // Valida segundo dígito verificador
        // for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
        // {
        //   $soma += $cnpj{$i} * $j;
        //   $j = ($j == 2) ? 9 : $j - 1;
        // }
        // $resto = $soma % 11;
        // return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }
}
