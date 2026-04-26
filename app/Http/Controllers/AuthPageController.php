<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AuthPageController extends Controller
{
    /**
     * Enrutador dinámico para las páginas de autenticación de legado.
     *
     * @param string $page
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(string $page = 'login')
    {
        // Si ya está autenticado, redirigir según el rol
        if (Auth::check() && ($page === 'login' || $page === 'index')) {
            $user = Auth::user();
            return $user->isCliente() 
                ? redirect('/tienda/mi-cuenta') 
                : redirect('/erp/dashboard');
        }

        // Sanitizar el nombre de la página
        $page = str_replace(['../', '..\\'], '', $page);
        
        $viewPath = 'auth.' . $page;

        if (view()->exists($viewPath)) {
            return view($viewPath);
        }

        // Manejo de compatibilidad para nombres antiguos
        if ($page === 'crear-cuenta') {
            return redirect('/auth/crear_cuenta');
        }

        abort(404, "Página de acceso no encontrada: {$page}");
    }
}
