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

        // Contraseñas originales (en producción esto no debería estar aquí por seguridad)
        $passwords = [
            'pedrofromera@outlook.com' => 'U9biFTKZE46x',
            'enmanuelcontreras10@gmail.com' => 'ehgqWD7p2XTY',
            'carlarodriguezga88@gmail.com' => 'UdW3rD5eCkNY',
            'marialiliana2240@gmail.com' => '4idxKGsA58zZ',
            'alvisarr@gmail.com' => 'LmC4RU6WKkgN',
            'cuicasheilen@gmail.com' => 'wFZuvQU5fgJ6',
            'drjmontalban2@gmail.com' => 'QfFCpPAyJoiH',
            'jovannyurbina31@gmail.com' => 'KzPedQZ49EVf',
            '11cocosita@gmail.com' => '6Apx7odBMzPm',
            'juanhrepuestos@gmail.com' => 'JbWVyCAufKtR',
            'Contacto.alexreal@gmail.com' => 'f8YNJigRpQU6',
            'willordlozano@gmail.com' => 'K73k8z56duW4',
            'gustavolongart@gmail.com' => 'BGxZUwJ6DSor',
            'gilbernas19@gmail.com' => 'X76Ndkgwac8P',
            'luyssay20@gmail.com' => 'MzW7oQEJNwxR',
            'Franco.varela.41@gmail.com' => 'FP6Mp2LTDEaA',
            'luisalexandermaurera@gmail.com' => 'f8Pkpisqauxz',
            'aliszerpa70@gmail.com' => 'RhnzoUstgxL2',
            'jap-autoparts@hotmail.com' => 'CBXWyFknrEhT',
            'comprasguarico2000@gmail.com' => '4yoG5SvUPRfk',
            'elcabezon2364@gmail.com' => 'PdX5NYUSygLq',
            'widodieugenio@hotmail.com' => '8yotRApdehXP',
            'duarte66@gmail.com' => '6AFHE8wztcpx',
            'jsrepuestos2013@gmail.com' => 'vsCGSmniAFWL',
            'ventasyoms@gmail.com' => '9TaHnRGf6DBM',
            'aryecarca@gmail.com' => 'LFe3uNRWmbsq',
            'autorepuestosgt@gmail.com' => 'bxFpKgzDXm4Q',
            'alejandrolacima@gmail.com' => 'tRZNzkEwX8oQ',
            'celestedevenezuela@hotmail.com' => '57xYN9Fdiqga',
            'fulleuropeosii@gmail.com' => 'JmLNPq6FgZY4',
            'repuestosrr410@gmail.com' => 'Pu2KzNxMtogL',
            'miguel_liberi@hotmail.com' => 'yK4SpLkfbhzA',
            'rusticaceres641@gmail.com' => 'YbNLrWPzZMm7',
            'autorepuestosleonycars2@gmail.com' => 'tNfwodvgF7VT',
            'jmaldonado2203@gmail.com' => '4Si9JyuWzAZq',
            'maldonado4j@gmail.com' => 'Bc3tGRy7zg4H',
            'david-sotomayor@hotmail.com' => 'CvkJ246zurfo',
            'bosmarcompras@gmail.com' => 'UQti4eqJfyhu',
            'autopartesargero@hotmail.com' => 'QZvfEFmRidqk',
            'munko1128@gmail.com' => 'UqZ8ns5HLwg4',
            'repuestoschato@gmail.com' => 'VQUdbNuLYCnZ',
            'repuestosmke2000ca@gmail.com' => '2p5Q8rHfwYKa',
            'repuestoskriss@gmail.com' => 'qwnSkvP2DKJe',
            'YMORCA22@GMAIL.COM' => '4BAfGcTE6euW',
            'losmapirerosca@hotmail.com' => 'PXCQLTRxUnHi',
            'mastershock.avcdeno@gmail.com' => 'PSnZbXvoegTJ',
            'maxxifordcarabobo@gmail.com' => 'h5msfoLuxKUq',
            'davalca02@gmail.com' => 'c6kzuBeNqVaY',
            'rodcabriales@gmail.com' => 'g3CoaNpAzQux',
            'AUTOMOTRIZGALVICA18@GMAIL.COM' => '5V4Ygbn2deFa',
            'mondoca_ale@yahoo.com' => 'n78yWZbfdGHQ',
            'inverconnan77@hotmail.com' => 'HimJrdUK5vQ9',
            'roberto.r@direco.com.ve' => 'XLUJS2zp7v8E',
            'fernandezjoseoscar@gmail.com' => 'Pn25eJypLER9',
            'a.d.elmolinon@hotmail.com autopartes.d.elmolinonca@gmail.com' => 'fUwVKgYBnDoZ',
            'cr9214473@gmail.com' => 'SGRUBoAq3V9z',
            'autopartesniraca@gmail.com' => 'yXwP48nCpADo',
            'dennsleal48@gmail.com' => 'PW9bxY7ke5X3',
            'autoparteslamaquina@gmail.com' => 'uc82dyHAWiMv',
            'higinio1049@gmail.com' => 'WzcRhDSEP23d',
            'frattazzi@hotmail.com' => 'z3AhZqUWPvLQ',
            'repuestosvalcavendiesel@gmail.com' => 'eoScQtA7C69K',
            'repuestostoyovolks@gmail.com' => 'T8REdMHVtbBA',
            'marlonrivas2905@gmail.com' => '2bo5yK6ehsQD',
            'multirepuestosverautos2021@gmail.com' => 'h2mKsuAyRqUQ',
            'pitsautoparts@gmail.com' => 'cqTzdXQpxYSu',
            'jmautomotriz2009@hotmail.com' => 'nhwqJxXMJJiC',
            'autorepuestos.chiquinquira@gmail.com' => 'w7mFaSL2bEVR',
            'repuestosyordi@yahoo.com' => 'seDazpAmoE7K',
            'wgonzalez@tornifal.com' => 'hJ86iycLTwFD',
            'repuestos_occidental@hotmail.com' => 'KxmvkpgPWU9a',
            'santarosaca@gmail.com' => '7zDmRfBaKEL9',
            'elnuevogigante@hotmail.com' => 'Lk4goUnbBZHA',
            'reinaldojosereyess@gmail.com' => 'kgPsQHJTXYSv',
            'autoparts77@gmail.com' => 'o3e279yh6Um5',
            'representacionesbeto@gmail.com' => 'pSn873YoLdBm',
            'hectorramonez1@gmail.com' => 'sDdzYBTVKF3e',
            'autorepmara_coro@hotmail.com' => 'tzifsaVBwkQY',
            'santabarbaradeoccidente@hotmail.com' => 'U2wkE5iADYSm',
            'puntofor@gmail.com' => 'LwQNZfFHzUrc',
            'toyobateca@hotmail.com' => 'obus2bEQeikJ',
            'repuestoscornelio@yahoo.com' => 'rppitb4G5otQ',
            'famaparts2020@gmail.com' => 'g5nY6ZWafkiJ',
            'corporaciongold@hotmail.com' => 'EZJzarZnQfWH',
            'elgigante2008@hotmail.com' => 'aHpwE6MXpbfo',
            'suteinca@outlook.es' => '5KFHdfQbA74G',
            'urbicompras@gmail.com urbi.ca@gmail.com' => 'wuC6qUEZSBcb',
            'tecnirepuestosortiz@gmail.com' => 'KaA3xMFtCLSS',
            'motoresbolivar@gmail.com' => '8EPvGNsA7ezR',
            'autorepuestosancla@hotmail.com' => 'SHnMAuCqsPpv',
            'lorenzoquijada1703@gmail.com' => 'HoqyPE9hUnJB',
            'reparauto2000@gmail.com' => 'osSmNca4XDk9',
            'gelmuttrodriguez5@gmail.com' => 'TeYuDXwsEAxo',
            'repuestosmartin100@gmail.com' => 'Yx8BZ9F3ds5g',
            'olicarinversionesyrepuestos@gmail.com' => 'YQ56AoaPRsSk',
            'palmi1466@gmail.com' => '4eDdgyJ2RoNE',
            'autopartesberevic_18@hotmail.com' => 'tMTPKJ4AhRfD',
            'J.bravo3000@gmail.com' => 'TdQbhBEYeHvC',
            'megarepuestos8000@gmail.com' => 'byPQYxiNk2g9',
            'super.repuestoselpollo@hotmail.com' => 'wNx9cnRydKMv',
            'repuestosguaikiki@gmail.com' => '6MZcELs9ZbZS',
            'repuestosdaya2016@hotmail.com' => 'Yu2HTKrWsRDA',
            'autorepuestosjoscar2015@gmail.com' => 'hdrHQ6gAHKPw',
            'rusticosdelsurca@gmail.com' => 'wWeiuBsrPzAo',
            'rustinorte@gmail.com' => 'SbrBSWBLCd3s',
            'arfilipenses413@gmail.com' => 'SyDwLWZnmz5N',
            'carlosgonzalez67@gmail.com' => 'mVBMtfyQwoc3',
            'comercialcontessi@gmail.com' => 'ZzQ7RnBEVHAx',
        ];

        return view('erp.configuracion.usuarios', compact('users', 'passwords'));
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
                'email' => 'required|email|unique:users,email',
                'cedula_rif' => 'nullable|string|max:20',
                'password' => 'required|string|min:8',
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
