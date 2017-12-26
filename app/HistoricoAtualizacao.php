<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class HistoricoAtualizacao extends Model
{
    //
    public $timestamps = false;
    protected $table = 'historico_atualizacao';
    protected $fillable = ['his_id', 'data_atualizacao', 'adm_id', 'status'];

    // método para inserir novo release
    public function saveRelease()
    {
        // data
        $mytime = \Carbon\Carbon::now();

        $release = new HistoricoAtualizacao();
        $release->data_atualizacao = $mytime->toDateTimeString();

        // dd($mytime->toDateTimeString());
        $release->status = 'D'; // ou I para habilitar depois

        // get user id logged
        $id = Auth::user()->id;
        $release->adm_id = $id;

        // save on database 
        $release->save();
  
        return $release;
    }
    
}
