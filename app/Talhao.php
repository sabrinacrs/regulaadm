<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talhao extends Model
{
    //
    protected $table = 'talhoes';
    protected $primaryKey = 'id';
    protected $fillable = [ 'id',
                            'descricao',
                            'tamanho',
                            'data_desativacao',
                            'faz_id'];

    public function allTalhoes()
    {
        return self::all();
    }

    public function saveTalhao()
    {
        $input = Input::all();
        $talhao = new Talhao();
        $talhao->fill($input);
        $talhao->save();

        return $talhao;
    }

    public function getTalhao($id)
    {
        $talhao = self::find($id);

        if(is_null($talhao))
            return false;

        return $talhao;
    }

    public function updateTalhao($id)
    {
        $talhao = self::find($id);
        if(is_null($talhao))
          return false;

        $input = Input::all();
        $talhao->fill($input);
        $talhao->save();

        return $talhao;
    }

    public function deleteTalhao($id)
    {
        $talhao = self::find($id);

        if(is_null($talhao))
          return false;

        return $talhao->delete();
    }
}
