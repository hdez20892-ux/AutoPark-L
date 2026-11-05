
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\EstacionamientoController;

// Página principal
Route::get('/', function () {
    return view('landing');
})->name('inicio');

// Registro
Route::get('/registro', [RegistroController::class, 'create'])
    ->name('registro');

Route::post('/registro', [RegistroController::class, 'store'])
    ->name('registro.store');

// GET: Mostrar estacionamientos
Route::get('/estacionamientos', [EstacionamientoController::class, 'index'])
    ->name('estacionamientos.index');

// PUT: Actualizar estacionamiento
Route::put('/estacionamientos/{id}', [EstacionamientoController::class, 'update'])
    ->name('estacionamientos.update');

// DELETE: Eliminar estacionamiento
Route::delete('/estacionamientos/{id}', [EstacionamientoController::class, 'destroy'])
    ->name('estacionamientos.destroy');
