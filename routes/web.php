<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Ruta para mostrar listado
Route::get("productos", function () {
    return "Listado de productos";
});


//Ruta para monstrar formualario de r crear productos
Route::post("productos", function () {
    return "Formulario de crear productos";
});

//Ruta para procesar el formulario de crear productos
Route::post("productos/crear", function () {
    return "Procesar formulario de crear productos";
});

//Ruta para mostrar un producto específico
Route::get("productos/{id}", function ($id) {
    return "Mostrando el producto con ID: " . $id;
});

//Ruta para mostrar formulario de editar productos

Route::get("productos/{id}/edit", function ($id) {
    return "Formulario de editar el producto con ID: " . $id;
});

//Ruta para procesar el formulario de editar productos

Route::put("productos/{id}", function ($id) {
    return "Procesar formulario de editar el producto con ID: " . $id;
});


//Ruta para eliminar un producto específico
Route::delete("productos/{id}", function ($id) {
    return "Eliminar el producto con ID: " . $id;
});
