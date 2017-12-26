<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fazenda extends Model
{
    //
    protected $table = 'fazendas';
    protected $primaryKey = 'id';
    protected $fillable = [
                            'id',
                            'nome',
                            'hectares',
                            'data_desativacao',
                            'cidade',
                            'uf',
                            'bairro',
                            'email',
                            'endereco_web',
                            'telefone',
                            'cli_id'];
        
    public function allFazendas()
    {
        return self::all();
    }

    public function saveFazenda()
    {
        $input = Input::all();
        $fazenda = new Fazenda();
        $fazenda->fill($input);
        $fazenda->save();

        return $fazenda;
    }

    public function getFazenda($id)
    {
        $fazenda = self::find($id);

        if(is_null($fazenda))
            return false;

        return $fazenda;
    }

    public function updateFazenda($id)
    {
        $fazenda = self::find($id);
        if(is_null($fazenda))
          return false;

        $input = Input::all();
        $fazenda->fill($input);
        $fazenda->save();

        return $fazenda;
    }

    public function deleteFazenda($id)
    {
        $fazenda = self::find($id);

        if(is_null($fazenda))
          return false;

        return $fazenda->delete();
    }
}
