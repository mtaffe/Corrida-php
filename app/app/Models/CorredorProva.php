<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prova;
use App\Models\Corredor;

class CorredorProva extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'corredor_provas';

    public static function addParticipacao(array $data)
    {
        $sql = self::insert([
            "corredor_id" => $data['corredor_id'],
            "prova_id" => $data['prova_id'],
        ]);
    }

    public static function getCorridasPorCorredor($corredorId)
    {
        $result = self::find($corredorId)->get();

        /*echo "<pre>";
        var_dump($result);
        die;
        */
    }

    public function corredor()
    {
        return $this->belongsTo(Corredor::class);
    }

    public function provas()
    {
        return $this->belongsTo(Prova::class);
    }
}
