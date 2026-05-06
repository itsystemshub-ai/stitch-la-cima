<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerificarRolUsuario
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (! Auth::check()) {
            return redirect('/auth/login')->with('error', 'Debes iniciar sesión.');
        }

        $user = Auth::user();

        if ($user->role !== $role) {
            return redirect('/erp/dashboard')->with('error', 'No tienes acceso a esta sección.');
        }

        return $next($request);
    }
}