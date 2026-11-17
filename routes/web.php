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

Route::get('/reservas', function () {
    return view('reservas'); 
})->name('reservas');


Route::get('/detalle-estacionamiento', function () {
    return view('detalleEstacionamiento');
})->name('estacionamientos.detalle');