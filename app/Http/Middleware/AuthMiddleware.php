<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return redirect('/auth/login')->with('error', 'Debes iniciar sesión para acceder al ERP.');
        }

        $user = Auth::user();

        if ($user->isCliente()) {
            return redirect('/tienda/mi-cuenta')->with('error', 'No tienes acceso al sistema ERP.');
        }

        if (! $user->is_active) {
            Auth::logout();

            return redirect('/auth/login')->with('error', 'Tu cuenta ha sido desactivada.');
        }

        return $next($request);
    }
}
