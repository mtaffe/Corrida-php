<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CorredoresController;
use App\Http\Controllers\ProvasController;
use App\Http\Controllers\CorredorProvasController;
use App\Http\Controllers\ResultadoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
  //  return view('dashboard');
//});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
  //  return view('dashboard');
//})->name('dashboard');

Route::get('/', [CorredoresController::class, 'index'])->name('dashboard');

Route::get('/cadastroCorredor', [CorredoresController::class, 'addCorredor'])->name('addCorredor');
Route::post('/cadastroCorredor', [CorredoresController::class, 'salvarCorredor'])->name('salvarCorredor');

Route::get('/cadastroProvas', [ProvasController::class, 'addProvas'])->name('addProvas');
Route::post('/cadastroProvas', [ProvasController::class, 'salvarProvas'])->name('salvarProvas');

Route::get('/participarProvas', [CorredorProvasController::class, 'participarProva'])->name('participar');
Route::post('/participarProvas', [CorredorProvasController::class, 'salvarParticipacao'])->name('addParticipacao');

Route::get('/resultadosProvas', [ResultadoController::class, 'addResultados'])->name('addResultado');
Route::post('/resultadosProvas', [ResultadoController::class, 'salvarResultados'])->name('salvarResultado');

Route::get('/resultados', [ResultadoController::class, 'selecionarProva'])->name('selecionarProva');
Route::post('/resultados', [ResultadoController::class, 'resultados'])->name('resultado');

Route::get('/resultadosCategorias', [ResultadoController::class, 'categoria'])->name('selecionarCategoria');
Route::post('/resultadosCategorias', [ResultadoController::class, 'resultadosCategoria'])->name('resultadosCaegoria');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
