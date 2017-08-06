<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EpocasSemeadura extends Model
{
  protected $table = 'epocasSemeaduras';
  protected $fillable = ['descricao', 'status'];
}
