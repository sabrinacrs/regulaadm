<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use DB;

class Cliente extends Model
{
  public $timestamps = false;
  protected $table = 'clientes';
  protected $primaryKey = 'id';
  protected $fillable = ['nome',
                          'email',
                          'login',
                          'senha',
                          'telefone',
                          'numero',
                          'uf',
                          'cep',
                          'logradouro',
                          'numero',
                          'bairro',
                          'cpf',
                          'data_desativacao',
                          'status'];

  public function allClientes()
  {
      return self::all();
  }

  public function saveCliente()
  {
      $input = Input::all();
      $input['senha'] = Hash::make($input['senha']);
      // dd($input); // para a execução e mostra input
      $cliente = new Cliente();
      $cliente->fill($input);
      $cliente->save();

      return $cliente;
  }

  public function getCliente($id)
  {
      $cliente = self::find($id);

      if(is_null($cliente))
        return false;

      return $cliente;
  }

  public function getClienteByEmail($email)
  {
    $cliente = DB::table('clientes')
              ->where('email', $email)
              ->get();

    if(is_null($cliente))
      return false;

    return $cliente;
  }

  public function getClienteByLogin($login)
  {
    $cliente = DB::table('clientes')
              ->where('login', $login)
              ->get();

    if(is_null($cliente))
      return false;

    return $cliente;
  }

  public function updateCliente($id)
  {
    $cliente = self::find($id);
    if(is_null($cliente))
      return false;

    $input = Input::all();
    if(isset($input['senha']))
        $input['senha'] = Hash::make($input['senha']);

    $cliente->fill($input);
    $cliente->save();

    return $cliente;
  }

  public function deleteCliente($id)
  {
      $cliente = self::find($id);

      if(is_null($cliente))
        return false;

      return $cliente->delete();
  }
}
