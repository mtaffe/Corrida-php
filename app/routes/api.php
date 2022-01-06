<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CorredoresController;
use App\Http\Controllers\ProvasController;
use App\Http\Controllers\CorredorProvasController;
use App\Http\Controllers\ResultadoController;
use App\Models\Corredor;
use App\Models\Prova;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::prefix('v1')->group(function()
{
    Route::get('cadastraCorredor', function()
    { 
       return CorredoresController::addCorredorApi();
    });
    
    Route::post('salvarCorredor', "App\Http\Controllers\CorredoresController@salvarCorredorApi");

    Route::get('cadastraProva', function()
    {
        return ProvasController::addProvasApi();
    });
    
    Route::post('salvarProva', "App\Http\Controllers\ProvasController@salvarProvasApi");

    Route::post('salvarParticipacao', "App\Http\Controllers\CorredorProvasController@salvarParticipacaoApi");

    Route::post('salvarResultado', "App\Http\Controllers\ResultadoController@salvarResultadosApi");
    Route::post('mostrarResultado', "App\Http\Controllers\ResultadoController@resultadosApi");
    Route::post('mostrarResultadoCategoria', "App\Http\Controllers\ResultadoController@resultadosCategoriaApi");
    
});