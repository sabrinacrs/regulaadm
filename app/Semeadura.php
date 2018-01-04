<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Semeadura extends Model
{
    //
    protected $table = 'semeaduras';
    protected $primaryKey = 'id';
    protected $fillable = ['quilos_sementes',
                            'germinacao',
                            'metros_lineares',
                            'talhao_id',
                            'cultivar_id',
                            'epoca_semeadura_id',
                            'data'];

    public function allSemeaduras()
    {
        return self::all();
    }

    public function saveSemeadura()
    {
        $input = Input::all();
        // dd($input); // para a execução e mostra input
        $semeadura = new Semeadura();
        $semeadura->fill($input);
        $semeadura->save();

        return $semeadura;
    }

    public function getSemeadura($id)
    {
        $semeadura = self::find($id);

        if(is_null($semeadura))
            return false;

        return $semeadura;
    }

    public function getSemeadurasByCliente($clienteId)
    {
        $semeaduras = DB::table('semeaduras')
                        ->join('talhoes', 'semeaduras.talhao_id', '=', 'talhoes.id')
                        ->join('fazendas', 'talhoes.faz_id', '=', 'fazendas.id')
                        ->where('fazendas.cli_id', $clienteId)
                        ->select('semeaduras.*')
                        ->get();

        if(empty($semeaduras))
            return false;

        return $semeaduras;
    }

    public function updateSemeadura($id)
    {
        $semeadura = self::find($id);
        if(is_null($semeadura))
            return false;

        $input = Input::all();
        $semeadura->fill($input);
        $semeadura->save();

        return $semeadura;
    }

    public function deleteSemeadura($id)
    {
        $semeadura = self::find($id);

        if(is_null($semeadura))
            return false;

        return $semeadura->delete();
    }
}
