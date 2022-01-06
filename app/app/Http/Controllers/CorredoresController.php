<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corredor;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CorredoresController extends Controller
{
    public function index()
    {
        return view('layout.dashboard');
    }

    public function addCorredor()
    {
        return view('layout.addCorredor');
    }

    public function salvarCorredorApi(Request $request)
    {
        try {
            $response = $this->novoCorredor($request);
        } catch (ValidationException $e) {
            $response = $e->errors();
        }
        return response($response, 200);
    }

    public function salvarCorredor(Request $request)
    {
        $corredor = $this->novoCorredor($request);
        return view('layout.addCorredor');
    }

    protected function novoCorredor(Request $request)
    {
        $messages = [
            "nome.required" => "É necessário um nome"
        ];


        $validated = $request->validate([
            "nome" => "required",
            "cpf" => "required|unique:corredores,cpf|max:11|min:11",
            "data_nascimento" => "required|date|before:18 years ago",
        ], $messages);

        Corredor::add($validated);

        return $validated;
    }
}
