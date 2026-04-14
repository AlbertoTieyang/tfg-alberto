<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Ruta cuando entras a la página
Route::get("/", [PageController::class, "index"])->name("index");

//Ruta para página nosotros
Route::get("/nosotros", [PageController::class, "nosotros"])->name("nosotros");

//Ruta para carta
Route::get("/carta", [PlatoController::class, "index"])->name("carta");

//Ruta para almacenar un plato
Route::post("/carta", [PlatoController::class, "store"])->name("plato.store");  

//Ruta para crear y editar un plato
Route::get("/carta/crear", [PlatoController::class, "create"])->name("plato.create");

//Ruta para reserva
Route::get("/reserva", [ReservaController::class, "create"])->name("reserva");

//Ruta para login 

//Ruta para registro 
