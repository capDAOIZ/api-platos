<?php

use App\Http\Controllers\PlatoController;
use Illuminate\Support\Facades\Route;

    Route::post('platos', [PlatoController::class, 'store']);  // Crear plato
    Route::put('platos/{id}', [PlatoController::class, 'update']); // Actualizar
    Route::delete('platos/{id}', [PlatoController::class, 'destroy']); // Eliminar
Route::get('platos', [PlatoController::class, 'index']); // Obtener todos los platos
Route::get('platos/{id}', [PlatoController::class, 'show']); // Obtener un plato por ID
