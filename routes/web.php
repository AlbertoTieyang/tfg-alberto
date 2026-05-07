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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('welcome');
});

//Se supone que es para las rutas de autentificados
Route::middleware(['auth'])->group(function() {
    //Ruta para almacenar un plato
    Route::post("/carta", [DishController::class, "store"])->name("plato.store");  

    //Ruta para crear y editar un plato
    Route::get("/carta/crear", [DishController::class, "create"])->name("plato.create");

    //Ruta de cuenta
    Route::get("/cuenta", [UserController::class, "show"])->name("cuenta");

    //Ruta para alamcenar una reserva
    Route::post("/reserva", [BookController::class, "store"])->name("reserva.store");

});
    
    //Ruta para enviar link de recuperar contraseña
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->middleware('guest')->name('password.request');
    
    //Ruta que maneja el formulario de recuperar contraseña
    Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::ResetLinkSent
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
    })->middleware('guest')->name('password.email');
    
    //Ruta del formulario de contraseña nueva
    Route::get('/reset-password/{token}', function (string $token) {
        return view('auth.reset-password', ['token' => $token]);
    })->middleware('guest')->name('password.reset');

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
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PasswordReset
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
    })->middleware('guest')->name('password.update');
    //Ruta cuando entras a la página
    Route::get("/", [PageController::class, "index"])->name("index");
    
    //Ruta para página nosotros
Route::get("/nosotros", [PageController::class, "nosotros"])->name("nosotros");

//Ruta para carta
Route::get("/carta", [DishController::class, "index"])->name("carta");


//Ruta para reserva
Route::get("/reserva", [BookController::class, "create"])->name("reserva");




