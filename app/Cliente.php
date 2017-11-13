<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
