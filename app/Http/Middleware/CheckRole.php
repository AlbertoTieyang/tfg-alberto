<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
         if (!$request->user()) {
            return redirect()->route('index')->with('no-user', 'Tienes que iniciar sesión para acceder a tu cuenta');
        }

        if ($role == 'admin' && $request->user()->rol_id != 1) {
            return redirect()->route('index')->with('trespasser', 'No puedes editar la página si no eres admin');
        }
        return $next($request);
    }
}
