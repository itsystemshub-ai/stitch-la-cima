<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;

class TiendaAuthController extends Controller
{
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

        DB::transaction(function () use ($validated, &$user) {
            // 1. Crear el Auth User Base
            $user = User::create([
                'name' => $validated['razon_social'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'cliente',
                'is_active' => true,
            ]);

            // 2. Crear el Perfil "Customer"
            Customer::create([
                'user_id' => $user->id,
                'razon_social' => $validated['razon_social'],
                'rif' => $validated['rif'],
                'tipo_cliente' => $validated['tipo_cliente'],
                'telefono' => $validated['telefono'],
                'activo' => true,
            ]);
        });

        Auth::login($user);

        return redirect('/tienda/mi-cuenta')->with('success', 'Registro completado exitosamente.');
    }

    /**
     * Show the customer dashboard.
     */
    public function miCuenta()
    {
        // En lugar de Auth::guard('tienda')->user(), usamos Auth::user()
        // Y cargamos el perfil Customer asociado
        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();
        
        if (!$customer) {
            return redirect('/')->with('error', 'Perfil de cliente no encontrado.');
        }

        return view('tienda.auth.mi-cuenta', compact('customer'));
    }
}
