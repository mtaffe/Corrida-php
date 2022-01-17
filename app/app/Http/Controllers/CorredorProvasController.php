<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CorredorProva;
use App\Models\Prova;
use App\Models\Corredor;

class CorredorProvasController extends Controller
{
    public function participarProva()
    {
        $data = Prova::all();
        return view('layout.participar', ['prova' => $data]);
    }

    public function salvarParticipacao(Request $request, Prova $prova)
    {
        $this->novaParticipao($request, $prova);
        $data = Prova::all();
        return view('layout.participar', ['prova' => $data]);
    }

    public function salvarParticipacaoApi(Request $request, Prova $prova)
    {
        $participacao = $this->novaParticipao($request, $prova);
        return response($participacao);
    }

    protected function novaParticipao(Request $request, Prova $prova)
    {
        $messages = [
            "corredor_id.required" => "Informe o seu ID",
            "prova_id.required" => "Informe o ID da prova"
        ];

        $validated = $request->validate([
            "corredor_id" => "required",
            "prova_id" => "required",
        ], $messages);

        $corredorId = $validated['corredor_id'];
        $provaId = $validated['prova_id'];

        $prova = Prova::find($provaId);
        $corredor = Corredor::find($corredorId);
        $corredorProvas = $corredor->prova->where('dia', '=', $prova->dia);

        if (!$corredorProvas->isEmpty()) {
            $data = Prova::all();
            return view('layout.participar', ['prova' => $data]);
        }

        CorredorProva::addParticipacao($validated);

        return $validated;
    }
}
