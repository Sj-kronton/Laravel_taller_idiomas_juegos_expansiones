<?php

use App\Http\Controllers\ExpansionController;
use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\JuegoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;

Route::get('/busqueda', function () {
    return view('welcome');
});

Route::get('/ulibro', function () {
    return view('ulibro');
});

// Catálogo público (página principal con filtros)
Route::get('/', [ProductoController::class, 'index'])->name('productos.index');

// Detalle del producto
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');



Route::prefix('admin')->name('productos.')->group(function () {
    Route::get('/productos', [ProductoController::class, 'admin'])->name('admin');
    Route::get('/productos/crear', [ProductoController::class, 'create'])->name('create');
    Route::post('/productos', [ProductoController::class, 'store'])->name('store');
    Route::get('/productos/{producto}/editar', [ProductoController::class, 'edit'])->name('edit');
    Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('update');
    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('destroy');
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

// Carrito de compras
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/add', [CarritoController::class, 'add'])->name('carrito.add');
Route::post('/carrito/update', [CarritoController::class, 'update'])->name('carrito.update');
Route::delete('/carrito/{id}', [CarritoController::class, 'remove'])->name('carrito.remove');

// Checkout
Route::get('/checkout', [CarritoController::class, 'checkout'])->name('carrito.checkout');
Route::post('/checkout/procesar', [CarritoController::class, 'procesar'])->name('carrito.procesar');