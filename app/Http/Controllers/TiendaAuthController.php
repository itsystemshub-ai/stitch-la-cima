<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class TiendaAuthController extends Controller
{
    /**
     * Show the login form - redirects to unified login.
     */
    public function showLoginForm()
    {
        return redirect('/auth/login');
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->isCliente()) {
                return redirect()->intended('/tienda/mi-cuenta')->with('success', 'Bienvenido de nuevo.');
            }

            return redirect('/erp/inicio');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    /**
     * Show the application registration form.
     */
    public function showRegisterForm()
    {
        return view('tienda.auth.register');
    }

    /**
     * Handle registration request.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'razon_social' => ['required', 'string', 'max:255'],
            'rif' => ['required', 'string', 'max:20', 'unique:customers'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'tipo_cliente' => ['required', 'in:B2B,B2C,Detal,Mayor'],
            'telefono' => ['nullable', 'string', 'max:20'],
        ]);

        $user = User::create([
            'name' => $validated['razon_social'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'cliente',
            'is_active' => true,
        ]);

        $customer = Customer::create([
            'razon_social' => $validated['razon_social'],
            'rif' => $validated['rif'],
            'tipo_cliente' => $validated['tipo_cliente'],
            'telefono' => $validated['telefono'],
            'activo' => true,
            'user_id' => $user->id,
        ]);

        Auth::login($user);

        return redirect('/tienda/mi-cuenta')->with('success', 'Registro completado exitosamente.');
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/tienda/index')->with('success', 'Sesión cerrada correctamente.');
    }

    /**
     * Show the customer dashboard.
     */
    public function miCuenta()
    {
        $customer = Auth::user()->customer;

        return view('tienda.auth.mi-cuenta', compact('customer'));
    }
}
