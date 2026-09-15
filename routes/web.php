<?php

use App\Http\Controllers\ExpansionController;
use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\JuegoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ulibro', function () {
    return view('ulibro');
});

// Idiomas
Route::get('/idiomas', [IdiomaController::class, 'index']);
Route::get('/idiomas/create', [IdiomaController::class, 'create']);
Route::get('/idiomas/{id}', [IdiomaController::class, 'show']);
Route::get('/idiomas/{id}/edit', [IdiomaController::class, 'edit']);
Route::post('/idiomas', [IdiomaController::class, 'store']);
Route::put('/idiomas/{id}', [IdiomaController::class, 'update']);
Route::delete('/idiomas/{id}', [IdiomaController::class, 'destroy']);

// Juegos
Route::get('/juegos', [JuegoController::class, 'index']);
Route::get('/juegos/create', [JuegoController::class, 'create']);
Route::get('/juegos/buscar', [JuegoController::class, 'search']);
Route::get('/juegos/{id}', [JuegoController::class, 'show']);
Route::get('/juegos/{id}/edit', [JuegoController::class, 'edit']);
Route::post('/juegos', [JuegoController::class, 'store']);
Route::put('/juegos/{id}', [JuegoController::class, 'update']);
Route::delete('/juegos/{id}', [JuegoController::class, 'destroy']);

// Expansiones
Route::get('/expansiones', [ExpansionController::class, 'index']);
Route::get('/expansiones/create', [ExpansionController::class, 'create']);
Route::get('/expansiones/{id}', [ExpansionController::class, 'show']);
Route::get('/expansiones/{id}/edit', [ExpansionController::class, 'edit']);
Route::post('/expansiones', [ExpansionController::class, 'store']);
Route::put('/expansiones/{id}', [ExpansionController::class, 'update']);
Route::delete('/expansiones/{id}', [ExpansionController::class, 'destroy']);
