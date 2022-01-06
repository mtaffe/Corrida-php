<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prova;
use App\Models\Corredor;

class Resultado extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'resultados';

    public static function addResultados(array $data)
    {
        $sql = self::insert([
            "corredor_id" => $data['corredor_id'],
            "prova_id" => $data['prova_id'],
            "inicio" => $data['inicio'],
            "chegada" => $data['chegada'],
        ]);
    }

    public function corredores()
    {
        return $this->belongsTo(Corredor::class);
    }

    public function provas()
    {
        return $this->belongsTo(Prova::class);
    }
}
