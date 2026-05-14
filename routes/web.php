<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

//Rutas para Admin 
Route::middleware(['auth', 'checkRole:admin'])->group(function() {

	//Ruta para almacenar un plato
	Route::post("/carta", [DishController::class, "store"])->name("plato.store");
	
	//Ruta para crear y editar un plato
	Route::get("/carta/crear", [DishController::class, "create"])->name("plato.create");

	//Ruta para editar un plato
	Route::get('/carta/{id}/editar', [DishController::class, 'edit'])->name('plato.edit');
	
	//Ruta para actualizar el plato
	Route::put('/carta/{id}', [DishController::class, 'update'])->name('plato.update');
	
	//Ruta para eliminar un plato
	Route::delete('/carta/{id}', [DishController::class, 'destroy'])->name('plato.destroy');
	
	//Ruta para activar/desactivar un plato
	Route::put('/carta/{id}/active', [DishController::class, 'active'])->name('plato.active');

});

//Rutas para gente registrada
Route::middleware(['auth'])->group(function() {

	//Ruta para cerrar sessión
	Route::get('/logout', function () {
		Auth::logout();
		request()->session()->invalidate();
		request()->session()->regenerateToken();
		return redirect('/')->with('success', 'Sesión cerrada correctamente');
	})->name('logout');

	//Ruta de cuenta
	Route::get("/cuenta", [UserController::class, "show"])->name("cuenta");

	//Ruta para cancelar 
	Route::delete("/cuenta/eliminar/{id}", [BookController::class, 'destroy'])->name('book.destroy');

});


//Ruta para enviar link de recuperar contraseña
Route::get('/forgot-password', function () {
	return view('auth.forgot-password'); })->middleware('guest')->name('password.request');

//Ruta que maneja el formulario de recuperar contraseña
Route::post('/forgot-password', function (Request $request) {
	$request->validate(['email' => 'required|email']);

	$status = Password::sendResetLink($request->only('email'));

	return $status === Password::ResetLinkSent ? back()->with(['status' => __($status)]) : back()->withErrors(['email' => __($status)]); })->middleware('guest')->name('password.email');

//Ruta del formulario de contraseña nueva
Route::get('/reset-password/{token}', function (string $token) {
	return view('auth.reset-password', ['token' => $token]); })->middleware('guest')->name('password.reset');

//Ruta que maneja el formulario de contraseña nueva
Route::post('/reset-password', function (Request $request) {
	$request->validate([
		'token' => 'required',
		'email' => 'required|email',
		'password' => 'required|min:8|confirmed',
	]);

	$status = Password::reset(
	$request->only('email', 'password', 'password_confirmation', 'token'),

	function (User $user, string $password) {
		$user->forceFill(['password' => Hash::make($password)])->setRememberToken(Str::random(60));
		$user->save();
		event(new PasswordReset($user));
	});

	return $status === Password::PasswordReset ? redirect()->route('login')->with('status', __($status)) : back()->withErrors(['email' => [__($status)]]); })->middleware('guest')->name('password.update');

//Ruta cuando entras a la página
Route::get("/", [PageController::class, "index"])->name("index");

//Ruta para carta
Route::get("/carta", [DishController::class, "index"])->name("carta");

//Ruta para reserva
Route::get("/reserva", [BookController::class, "create"])->name("reserva");

//Ruta para almacenar una reserva. Está fuera de auth, porque quiero que me envía al formulario de registro y de un mensaje
Route::post("/reserva", [BookController::class, "store"])->name("reserva.store");

//Ruta para confirmar reserva por correo
Route::get("/reserva/confirmar/{token}", [BookController::class, "confirm"])->name("reserva.confirm");