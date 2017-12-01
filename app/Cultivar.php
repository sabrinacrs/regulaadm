<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cultivar extends Model
{
  public $timestamps = false;
  protected $table = 'cultivares';
  protected $primaryKey = 'id'; 
  protected $fillable = [
              'nome',
              'altura_planta',
              'fertilidade',
              'regulador',
              'rendimento_fibra_minimo',
              'rendimento_fibra_maximo',
              'peso_capulho_minimo',
              'peso_capulho_maximo',
              'comprimento_fibra_minimo',
              'comprimento_fibra_maximo',
              'micronaire_minimo',
              'micronaire_maximo',
              'resistencia_minimo',
              'resistencia_maximo',
              'peso_sementes_minimo',
              'peso_sementes_maximo',
              'cic_id'
  ];
}
