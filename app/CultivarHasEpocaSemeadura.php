<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CultivarHasEpocaSemeadura extends Model
{
  public $timestamps = false;
  protected $table = 'cultivar_has_epocasemeadura';
  protected $fillable = ['cult_id', 'ep_id', 'plantas_ha'];
}
