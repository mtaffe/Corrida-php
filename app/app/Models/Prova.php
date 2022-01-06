<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CorredorProva;
use App\Models\Corredor;
use App\Models\Resultado;

class Prova extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'provas';

    public static function addProvas(array $data)
    {
        $sql = self::insert([
            "tipo" => $data['tipo'],
            "dia" => $data['dia'],
        ]);
    }

    public function corredor()
    {
        return $this->belongsToMany(Corredor::class, 'corredor_provas', 'prova_id', 'corredor_id');
    }

    public function resultadosProva()
    {
        return $this->hasMany(Resultado::class);
    }
}
