
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;

Route::get('/', function () {
    return view('landing');
})->name('inicio');

Route::get('/registro', [RegistroController::class, 'create'])
    ->name('registro');

Route::post('/registro', [RegistroController::class, 'store'])
    ->name('registro.store');
