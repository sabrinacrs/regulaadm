<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cultivar extends Model
{
  protected $table = 'cultivares';
  protected $fillable = ['nome',
                          'altura_planta',
                          'fertilidade',
                          'regulador',
                          'rendimento_fibra',
                          'peso_capulho',
                          'comprimento_fibra',
                          'micronaire',
                          'resistencia',
                          'peso_sementes_minimo',
                          'peso_sementes_maximo',
                          'cic_id'];
}
