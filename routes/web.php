<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\EstacionamientoController;
use App\Http\Controllers\ReservaController;

// Página principal
Route::get('/', function () {
    return view('landing');
})->name('inicio');

// Registro
Route::get('/registro', [RegistroController::class, 'create'])
    ->name('registro');

Route::post('/registro', [RegistroController::class, 'store'])
    ->name('registro.store');

// --- RUTAS DE ESTACIONAMIENTOS (CRUD) ---

// 1. Mostrar listado
Route::get('/estacionamientos', [EstacionamientoController::class, 'index'])
    ->name('estacionamientos.index');

// 2. Mostrar formulario de creación
Route::get('/estacionamientos/create', [EstacionamientoController::class, 'create'])
    ->name('estacionamientos.create');

// 3. Guardar nuevo registro
Route::post('/estacionamientos', [EstacionamientoController::class, 'store'])
    ->name('estacionamientos.store');

// 4. Actualizar estacionamiento
Route::put('/estacionamientos/{id}', [EstacionamientoController::class, 'update'])
    ->name('estacionamientos.update');

// 5. Eliminar estacionamiento
Route::delete('/estacionamientos/{id}', [EstacionamientoController::class, 'destroy'])
    ->name('estacionamientos.destroy');


// --- RUTAS DE LA BARRA DE NAVEGACIÓN (Navbar) ---
// Estas evitan el error 404 al hacer clic en las opciones del menú superior

Route::get('/busqueda', function () {
    return view('busqueda'); 
})->name('busqueda');

Route::get('/nosotros', function () {
    return view('nosotros'); 
})->name('nosotros');

Route::get('/servicios', function () {
    return view('servicios'); 
})->name('servicios');

Route::get('/contacto', function () {
    return view('contacto'); 
})->name('contacto');

Route::get('/login', function () {
    return view('login'); 
})->name('login');

Route::get('/perfil', function () {
    return view('perfil'); 
})->name('perfil');



// --- CRUD DE RESERVAS ---

// Mostrar reservas
Route::get('/reservas', [ReservaController::class, 'index'])
    ->name('reservas.index');

// Mostrar formulario de creación
Route::get('/reservas/create', [ReservaController::class, 'create'])
    ->name('reservas.create');

// Guardar reserva
Route::post('/reservas', [ReservaController::class, 'store'])
    ->name('reservas.store');

// Mostrar formulario de edición
Route::get('/reservas/{id}/edit', [ReservaController::class, 'edit'])
    ->name('reservas.edit');

// Actualizar reserva
Route::put('/reservas/{id}', [ReservaController::class, 'update'])
    ->name('reservas.update');

// Cancelar reserva
Route::patch('/reservas/{id}/cancelar', [ReservaController::class, 'cancel'])
    ->name('reservas.cancel');