<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí se registran las rutas web para tu aplicación.
| Cargadas dentro del grupo "web" middleware.
|
*/

// Ruta raíz que muestra el listado de productos
Route::get('/', [ProductoController::class, 'index'])->name('home');

// CRUD completo de productos
Route::resource('productos', ProductoController::class);
