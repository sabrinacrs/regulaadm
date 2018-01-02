<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Fazenda extends Model
{
    public $timestamps = false;
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

    public function getFazendasByCliente($clienteId)
    {
        $fazendas = Fazenda::where('cli_id', $clienteId)->get();

        if(empty($fazendas))
            return false;

        return $fazendas;
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
