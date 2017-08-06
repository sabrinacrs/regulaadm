<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CultivarHasDoencas extends Model
{
  public $timestamps = false;
  protected $table = 'cultivares_has_doencas';
  protected $fillable = ['cult_id', 'doe_id','tol_id'];
}
