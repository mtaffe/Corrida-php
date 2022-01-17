<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resultado;
use App\Models\Prova;
use App\Models\Corredor;

class ResultadoController extends Controller
{
    //adiciona resultado (web-get)
    public function addResultados()
    {
        $data = Prova::all();
        return view('layout.addresultado', ['provas' => $data]);
    }

    //salva resultado (web-post)
    public function salvarResultados(Request $request)
    {
        $this->novoResultado($request);
        $data = Prova::all();
        return view('layout.addresultado', ['provas' => $data]);
    }

    //escolhe prova para mostrar resultado (web-get)
    public function selecionarProva()
    {
        $data = Prova::all();
        return view('layout.resultadogeral', ['prova' => $data]);
    }

    //mostrar resultado (web-post)
    public function resultados(Request $request)
    {
        $resultado = $this->geraResultados($request);
        return view('layout.listachegada', ['resultado' => $resultado, 'posicao' => 1]);
    }

    //seleciona categoria para mostrar resultado (web-get)
    public function categoria()
    {
        $data = Prova::all();
        return view('layout.resultadoCategoria', ['prova' => $data]);
    }

    //mostra resultados por categria (web-post)
    public function resultadosCategoria(Request $request)
    {
        $resultados = $this->geraResultadosCategoria($request);
        return view('layout.listachegada', ['resultado' => $resultados, 'posicao' => 1]);
    }


    //salva resultado (api-post)
    public function salvarResultadosApi(Request $request)
    {
        $resultado = $this->novoResultado($request);
        return response($resultado, 200);
    }

    //mostrar resultado (api-post)
    public function resultadosApi(Request $request)
    {
        $resultado = $this->geraResultados($request);
        return response($resultado, 200);
    }


    //mostrar resultador por categoria (api-post)
    public function resultadosCategoriaApi(Request $request)
    {
        $resultados = $this->geraResultadosCategoria($request);
        return response($resultados, 200);
    }

    //função para gerar resultados por categoria
    protected function geraResultadosCategoria(Request $request)
    {
        $messages = [
            "prova_id.required" => "Insira o Id da prova",
            "categoria.required" => "Insira uma categoria"
        ];

        $validated = $request->validate([
            "prova_id" => "required",
            "categoria" => "required",
        ], $messages);

        $provaId = $validated['prova_id'];
        $prova = Prova::find($provaId);
        $categoria = $validated['categoria'];

        $idadeInicial = 18;
        $idadeFinal = 25;


        switch ($categoria) {
            //Categoria 25-35
            case 2:
                $idadeInicial = 25;
                $idadeFinal = 35;
                break;

            //Categoria 35-45
            case 3:
                $idadeInicial = 35;
                $idadeFinal = 45;
                break;

            //Categoria 45-55
            case 4:
                $idadeInicial = 45;
                $idadeFinal = 55;
                break;

            //Categoria 55+
            case 5:
                $idadeInicial = 55;
                $idadeFinal = 150;
                break;

            default:
                $idadeInicial = 18;
                $idadeFinal = 25;
                break;
        }

        $resultados = $this->buscaResultadosFaixaIdade($prova, $idadeInicial, $idadeFinal);

        return $resultados;
    }

    //função para juntar resultados por categoria
    protected function buscaResultadosFaixaIdade(Prova $prova, $idadeInicial, $idadeFinal)
    {
        $anoInicial = date('Y-m-d', strtotime('-' . $idadeInicial . ' years', strtotime($prova->dia)));
        $anoFinal = date('Y-m-d', strtotime('-' . $idadeFinal . ' years', strtotime($prova->dia)));

        $resultado = Resultado::join('corredores', 'corredor_id', '=', 'corredores.id')
        ->join('provas', 'provas.id', '=', 'resultados.prova_id')
        ->where("resultados.prova_id", '=', $prova->id)
        ->whereDate('data_nascimento', '<', $anoInicial)
        ->whereDate('data_nascimento', '>', $anoFinal)
        ->orderBy('chegada', 'asc')
        ->get();

        return $resultado;
    }

    //função para adicionar resultados
    protected function novoResultado(Request $request)
    {
        $messages = [
            "corredor_id.required" => "Insira o seu ID",
            "prova_id.required" => "Insira o ID da prova",
            "inicio.required" => "Insira a hora de ínicio da prova",
            "chegada.required" => "Insira a hora de conclusão da prova",
        ];

        $validated = $request->validate([
            "corredor_id" => "required",
            "prova_id" => "required",
            "inicio" => "required",
            "chegada" => "required",
        ], $messages);

        Resultado::addResultados($validated);

        return $validated;
    }

    //função para exibir resultado geral
    protected function geraResultados(Request $request)
    {
        $messages = [
            "prova_id.required" => "Insira o Id da prova"
        ];

        $validated = $request->validate([
            "prova_id" => "required",
        ], $messages);

        $prova = $validated['prova_id'];

        $resultado = Resultado::join('corredores', 'corredor_id', '=', 'corredores.id')
        ->join('provas', 'provas.id', '=', 'resultados.prova_id')
        ->where("resultados.prova_id", '=', $prova)
        ->orderBy('chegada', 'asc')
        ->get();

        return $resultado;
    }
}
