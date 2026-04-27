<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Payroll;
use App\Services\HrService;
use Illuminate\Support\Facades\Auth;

class RrhhController extends Controller
{
    protected HrService $hrService;

    public function __construct(HrService $hrService)
    {
        $this->hrService = $hrService;
    }

    public function index()
    {
        $stats = [
            'total_empleados' => Employee::count(),
            'empleados_activos' => Employee::where('estatus', 'ACTIVO')->count(),
            'nomina_por_pagar' => Payroll::where('estatus', 'PENDIENTE')->sum('total_pagar'),
        ];
        
        $recentEmployees = Employee::orderBy('created_at', 'desc')->take(5)->get();

        // Calcular distribución de empleados por departamento
        $deptMix = Employee::select('departamento', \DB::raw('count(*) as total'))
            ->groupBy('departamento')
            ->orderBy('total', 'desc')
            ->get();
            
        // Resumen de Nómina Pendiente
        $payrollSummary = [
            'salarios_base' => Payroll::where('estatus', 'PENDIENTE')->sum('salario_base'),
            'horas_extra' => Payroll::where('estatus', 'PENDIENTE')->sum('horas_extra'),
            'bonos' => Payroll::where('estatus', 'PENDIENTE')->sum('bonos'),
            'deducciones' => Payroll::where('estatus', 'PENDIENTE')->sum('deducciones'),
            'total_neto' => Payroll::where('estatus', 'PENDIENTE')->sum('total_pagar'),
        ];

        return view('erp.rrhh.index', compact('stats', 'recentEmployees', 'deptMix', 'payrollSummary'));
    }

    public function empleados()
    {
        $empleados = Employee::latest()->paginate(20);
        return view('erp.rrhh.empleados', compact('empleados'));
    }

    public function storeEmpleado(Request $request)
    {
        $validated = $request->validate([
            'cedula' => 'required|unique:employees',
            'nombre' => 'required',
            'apellido' => 'required',
            'salario' => 'required|numeric',
            'fecha_ingreso' => 'required|date',
        ]);

        $this->hrService->registerEmployee($validated);

        return redirect()->route('erp.rrhh.empleados')->with('success', 'Empleado registrado correctamente.');
    }

    public function nomina()
    {
        $payrolls = Payroll::with('employee')->latest()->paginate(20);
        return view('erp.rrhh.nomina', compact('payrolls'));
    }

    public function generateNomina(Request $request)
    {
        $period = $request->input('periodo', now()->format('F-Y'));
        $count = $this->hrService->generatePayroll($period, Auth::id());

        return redirect()->route('erp.rrhh.nomina')->with('success', "Nómina generada para $count empleados.");
    }

    public function prestaciones() { return view('erp.rrhh.prestaciones'); }
    public function portalEmpleado() { return view('erp.rrhh.portal-empleado'); }
    public function rendimiento() { return view('erp.rrhh.rendimiento'); }
    public function reportes() { return view('erp.rrhh.reportes'); }
}
