<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';
    protected $fillable = ['nome',
                            'razao_social',
                          'ramo_atividade',
                          'cnpj',
                          'email',
                          'site',
                          'telefone',
                          'rua',
                          'cidade',
                          'bairro',
                          'cep',
                          'numero',
                          'uf',
                          'logo',
                          'status'];
}
