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

//Se supone que es para las rutas de autentificados (no lo sé)
Route::middleware(['auth'])->group(function() {
    //Ruta para almacenar un plato
    Route::post("/carta", [PlatoController::class, "store"])->name("plato.store");  

    //Ruta para crear y editar un plato
    Route::get("/carta/crear", [PlatoController::class, "create"])->name("plato.create");

    //Ruta para cerrar sesion (no funciona, lo pongo en comentario)(?)
    /* Route::get('/logout', function () {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/')->with('success', 'Sesión cerrada correctamente');
    })->name('logout'); */
});

//Ruta cuando entras a la página
Route::get("/", [PageController::class, "index"])->name("index");

//Ruta para página nosotros
Route::get("/nosotros", [PageController::class, "nosotros"])->name("nosotros");

//Ruta para carta
Route::get("/carta", [PlatoController::class, "index"])->name("carta");


//Ruta para reserva
Route::get("/reserva", [ReservaController::class, "create"])->name("reserva");


