<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerificarPermisoModulo
{
    public function handle(Request $request, Closure $next, string $modulo): Response
    {
        if (! Auth::check()) {
            return redirect('/auth/login')->with('error', 'Debes iniciar sesión.');
        }

        $user = Auth::user();

        if ($user->isCliente()) {
            abort(403, 'No tienes acceso al sistema.');
        }

        if (! $user->puedeAccederModulo($modulo)) {
            if ($request->expectsJson()) {
                return response()->json([
                    'error' => 'No tienes permiso para acceder a este módulo.',
                    'modulo' => $modulo,
                    'modulos_permitidos' => $user->getModulos(),
                ], 403);
            }

            return redirect('/erp/inicio')
                ->with('error', 'No tienes permiso para acceder al módulo: '.$modulo);
        }

        return $next($request);
    }
}
