<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Ruta cuando entras a la página
Route::get("/", [PageController::class, "index"])->name("index");

//Ruta para página nosotros
Route::get("/nosotros", [PageController::class, "nosotros"])->name("nosotros");

//Ruta para carta


//Ruta para hacer las reservas


//Ruta para login 

//Ruta para registro 
