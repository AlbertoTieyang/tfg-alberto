<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Se supone que es para las rutas de autentificados (no lo sé)
Route::middleware(['auth'])->group(function() {
    //Ruta para almacenar un plato
    Route::post("/carta", [DishController::class, "store"])->name("plato.store");  

    //Ruta para crear y editar un plato
    Route::get("/carta/crear", [DishController::class, "create"])->name("plato.create");

    //Ruta para cerrar sesion (no funciona, lo pongo en comentario)(?)
    

    Route::get("/cuenta", [UserController::class, "show"])->name("cuenta");
});

//Ruta cuando entras a la página
Route::get("/", [PageController::class, "index"])->name("index");

//Ruta para página nosotros
Route::get("/nosotros", [PageController::class, "nosotros"])->name("nosotros");

//Ruta para carta
Route::get("/carta", [DishController::class, "index"])->name("carta");


//Ruta para reserva
Route::get("/reserva", [BookController::class, "create"])->name("reserva");


