<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login page.
     */
    public function showLoginForm()
    {
        // Redirección inteligente si ya está logueado
        if (Auth::check()) {
            return $this->redirectBasedOnRole(Auth::user());
        }
        return view('auth.login');
    }

    /**
     * Handle login attempt.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $loginField = filter_var($credentials['email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        
        if (Auth::attempt([$loginField => $credentials['email'], 'password' => $credentials['password']], $request->boolean('remember'))) {
            $request->session()->regenerate();
            
            return $this->redirectBasedOnRole(Auth::user());
        }

        return back()->withErrors([
            'email' => 'Las credenciales no son válidas.',
        ])->onlyInput('email');
    }

    /**
     * Handle logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth/login');
    }

    /**
     * Redirect users based on their assigned role
     */
    protected function redirectBasedOnRole($user)
    {
        if ($user->role === 'cliente') {
            return redirect()->intended('/tienda/mi-cuenta')->with('success', 'Bienvenido a La Cima B2B.');
        } 
        
        // Si es admin, trabajador o vendedor
        return redirect()->intended('/erp/inicio')->with('success', 'Sesión iniciada. Bienvenido al ERP.');
    }
}
