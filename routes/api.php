<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AudienciasController;
use App\Http\Controllers\CidadesController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ComarcasController;
use App\Http\Controllers\EscritoriosController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\FiliaisController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\NaturezasController;
use App\Http\Controllers\OcupacoesController;
use App\Http\Controllers\PaisesController;
use App\Http\Controllers\PerfisController;
use App\Http\Controllers\ProcessosController;
use App\Http\Controllers\TribunaisController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UsersFiliaisController;
use App\Http\Controllers\VarasController;

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

Route::group(['middleware' => ['guest:api']], function() {
    Route::post('/login', [AuthController::class, 'login']);     
});

Route::group(['middleware' => ['auth:api']], function() {
    Route::get('/logout', [AuthController::class, 'logout']); 
    Route::get('/check', [AuthController::class, 'check']); 

    Route::resource('audiencias', AudienciasController::class);
    Route::resource('cidades', CidadesController::class);
    Route::resource('clientes', ClientesController::class);
    Route::resource('comarcas', ComarcasController::class);
    Route::resource('escritorios', EscritoriosController::class);
    Route::resource('estados', EstadosController::class);
    Route::resource('filiais', FiliaisController::class);
    Route::resource('logs', LogsController::class);
    Route::resource('naturezas', NaturezasController::class);
    Route::resource('ocupacoes', OcupacoesController::class);
    Route::resource('paises', PaisesController::class);
    Route::resource('perfis', PerfisController::class);
    Route::resource('processos', ProcessosController::class);
    Route::resource('tribunais', TribunaisController::class);
    Route::resource('users', UsersController::class);
    Route::resource('users-filiais', UsersFiliaisController::class);
    Route::resource('varas', VarasController::class);

    Route::get('cidades/{id}/where',  [CidadesController::class, 'where']);
    Route::get('comarcas/{id}/where',  [ComarcasController::class, 'where']);
    Route::get('estados/{id}/where',  [EstadosController::class, 'where']);
    Route::get('varas/{id}/where',  [VarasController::class, 'where']);
});