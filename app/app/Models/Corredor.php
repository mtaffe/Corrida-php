<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CorredorProva;
use App\Models\Prova;

class Corredor extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'corredores';

    public static function add(array $data)
    {
        $sql = self::insert([
            "nome" => $data['nome'],
            "cpf" => $data['cpf'],
            "data_nascimento" => $data['data_nascimento']
        ]);
    }

    public function prova()
    {
        return $this->belongsToMany(Prova::class, 'corredor_provas', 'corredor_id', 'prova_id');
    }

    public function resultadosProva()
    {
        return $this->hasMany(Resultado::class);
    }
}
