<?php

use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PrestadorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::prefix('especialidad')->group(function(){

    Route::get('/',[EspecialidadController::class,'index']);
    Route::get('/{id}',[EspecialidadController::class,'show']);
    Route::post('/',[EspecialidadController::class,'store']);
    Route::put('/{id}',[EspecialidadController::class,'update']);
    Route::delete('/{id}',[EspecialidadController::class,'destroy']);

});

Route::prefix('paciente')->group(function(){
    Route::get('/',[PacienteController::class,'index']);
    Route::get('/{id}',[PacienteController::class,'show']);
    Route::post('/',[PacienteController::class,'store']);
    Route::put('/{id}',[PacienteController::class,'update']);
    Route::delete('/{id}',[PacienteController::class,'destroy']);
});

Route::prefix('prestador')->group(function(){
    Route::get('/',[PrestadorController::class,'index']);
    Route::get('/{id}',[PrestadorController::class,'show']);
    Route::post('/',[PrestadorController::class,'store']);
    Route::put('/{id}',[PrestadorController::class,'update']);
    Route::delete('/{id}',[PrestadorController::class,'destroy']);
});