<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EpocasSemeadura extends Model
{
  protected $table = 'epocassemeaduras';
  protected $fillable = ['descricao', 'status'];
}
