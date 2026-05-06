<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\SystemConfigService;

class ConfiguracionController extends Controller
{
    protected SystemConfigService $configService;

    public function __construct(SystemConfigService $configService)
    {
        $this->configService = $configService;
    }

    public function index() 
    { 
        $health = $this->configService->getSystemHealth();
        return view('erp.configuracion.index', compact('health')); 
    }

    public function estadoSistema()
    {
        $health = $this->configService->getSystemHealth();
        $dbStats = $this->configService->getDatabaseStats();
        $users = \App\Models\User::all();
        return view('erp.configuracion.estado-sistema', compact('health', 'dbStats', 'users'));
    }

    public function parametros() { return view('erp.configuracion.parametros'); }
    public function fiscal() { return view('erp.configuracion.fiscal'); }
    public function usuarios() 
    { 
        $users = \App\Models\User::orderBy('created_at', 'desc')->get();
        return view('erp.configuracion.usuarios', compact('users')); 
    }
    public function baseDatos() 
    { 
        $dbStats = $this->configService->getDatabaseStats();
        return view('erp.configuracion.base-datos', compact('dbStats')); 
    }

    public function gestorTablas()
    {
        $dbStats = $this->configService->getDatabaseStats();
        return view('erp.configuracion.gestor-tablas', compact('dbStats'));
    }

    /**
     * Visualizar el contenido de una tabla específica.
     */
    public function verContenidoTabla($tabla)
    {
        if (!\Schema::hasTable($tabla)) {
            return redirect()->route('erp.configuracion.gestor-tablas')->with('error', 'La tabla especificada no existe.');
        }

        $columnas = \Schema::getColumnListing($tabla);
        $datos = \DB::table($tabla)->paginate(50);
        
        return view('erp.configuracion.ver-tabla', compact('tabla', 'columnas', 'datos'));
    }

    public function backups() { return view('erp.configuracion.backups'); }
    public function tareas() { return view('erp.configuracion.tareas'); }
    public function auditoria() { return view('erp.configuracion.auditoria'); }

    public function showSync() { return view('configuracion.sync'); }

    public function testUsuarios()
    {
        $users = \App\Models\User::orderBy('created_at', 'desc')->get();
        return view('erp.configuracion.test-usuarios', compact('users'));
    }

    public function destroyUser($id)
    {
        try {
            $user = \App\Models\User::findOrFail($id);

            // No permitir eliminar al admin principal
            if ($user->role === 'admin' && $user->email === 'admin@lacima.com') {
                return response()->json(['error' => 'No se puede eliminar al administrador principal'], 403);
            }

            // No permitir que un usuario se elimine a sí mismo
            if (auth()->id() === $user->id) {
                return response()->json(['error' => 'No puedes eliminar tu propia cuenta'], 403);
            }

            // Eliminar notificaciones relacionadas
            $user->notifications()->delete();

            // Eliminar el usuario
            $user->delete();

            return response()->json(['success' => 'Usuario eliminado exitosamente']);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el usuario: ' . $e->getMessage()], 500);
        }
    }

    public function storeUser(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'cedula_rif' => 'nullable|string|max:20',
                'password' => 'required|string|min:8',
                'role' => 'required|in:admin,vendedor,cliente,trabajador',
                'is_active' => 'boolean',
            ]);

            $validated['password'] = bcrypt($validated['password']);

            \App\Models\User::create($validated);

            return response()->json(['success' => 'Usuario creado exitosamente']);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el usuario: ' . $e->getMessage()], 500);
        }
    }

    public function updateUser(Request $request, $id)
    {
        try {
            $user = \App\Models\User::findOrFail($id);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
                'cedula_rif' => 'nullable|string|max:20',
                'role' => 'required|in:admin,vendedor,cliente,trabajador',
                'is_active' => 'boolean',
            ]);

            // No permitir cambiar el rol del admin principal
            if ($user->email === 'admin@lacima.com' && $validated['role'] !== 'admin') {
                return response()->json(['error' => 'No se puede cambiar el rol del administrador principal'], 403);
            }

            $user->update($validated);

            return response()->json(['success' => 'Usuario actualizado exitosamente']);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el usuario: ' . $e->getMessage()], 500);
        }
    }
}
