<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prova;

class ProvasController extends Controller
{
    public function addProvas()
    {
        return view('layout.addProvas');
    }

    public static function addProvasApi()
    {
        return view('layout.addProvas');
    }

    public function salvarProvasApi(Request $request)
    {
        $prova = $this->novaProva($request);
        return response($prova, 200);
    }

    public function salvarProvas(Request $request)
    {
        $this->novaProva($request);
        return view('layout.dashboard');
    }

    protected function novaProva(Request $request)
    {
        $validated = $request->validate([
            "tipo" => "required",
            "dia" => "required|date"
        ]);

        Prova::addProvas($validated);

        return $validated;
    }
}
