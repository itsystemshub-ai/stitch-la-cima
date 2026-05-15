<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Notification;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HrService
{
    protected AccountingService $accountingService;

    public function __construct(AccountingService $accountingService)
    {
        $this->accountingService = $accountingService;
    }

    /**
     * Registrar un nuevo empleado.
     */
    public function registerEmployee(array $data)
    {
        return Employee::create($data);
    }

    /**
     * Generar la nómina para todos los empleados activos en un periodo.
     * periodicidad: 'quincenal' o 'mensual'
     */
    public function generatePayroll(string $period, int $userId)
    {
        $employees = Employee::where('estatus', 'ACTIVO')->get();
        $count = 0;

        return DB::transaction(function () use ($employees, $period, $userId, &$count) {
            $periodTotalPagar = 0;
            $periodTotalDeducciones = 0;

            // Pre-calcular comisiones de todos los vendedores para este mes
            $emails = $employees->pluck('email')->filter()->toArray();
            $sellerUsers = User::whereIn('email', $emails)->get()->keyBy('email');
            $sellerIds = $sellerUsers->pluck('id')->toArray();

            $commissions = Order::whereIn('vendedor_id', $sellerIds)
                ->where('estado', 'Pagado')
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->select('vendedor_id', DB::raw('SUM(total) as total_ventas'))
                ->groupBy('vendedor_id')
                ->get()
                ->keyBy('vendedor_id');

            foreach ($employees as $employee) {
                $salarioBase = $employee->salario;
                $bonos = 0; 
                
                // CÁLCULO DE COMISIONES
                if ($employee->cargo === 'Vendedor Externo' || $employee->cargo === 'Vendedor') {
                    $user = $sellerUsers->get($employee->email);
                    if ($user && isset($commissions[$user->id])) {
                        $ventasMes = $commissions[$user->id]->total_ventas;
                        $bonos = $ventasMes * 0.05; // 5% de comisión por defecto
                    }
                }

                $deducciones = $salarioBase * 0.04; // 4% S.S.O y otros
                $totalPagar = $salarioBase + $bonos - $deducciones;

                $periodTotalPagar += $totalPagar;
                $periodTotalDeducciones += $deducciones;

                Payroll::updateOrCreate(
                    [
                        'employee_id' => $employee->id,
                        'periodo' => $period,
                    ],
                    [
                        'salario_base' => $salarioBase,
                        'bonos' => $bonos,
                        'deducciones' => $deducciones,
                        'total_pagar' => $totalPagar,
                        'estatus' => 'PENDIENTE',
                        'fecha_pago' => now(),
                    ]
                );
                $count++;
            }

            // INTERFAZ CONTABLE: Registro automático de nómina
            if ($count > 0) {
                $this->accountingService->registerPayroll($periodTotalPagar, $periodTotalDeducciones, $period);
            }

            Notification::create([
                'user_id' => $userId,
                'type' => 'success',
                'title' => 'Nómina Generada',
                'message' => "Se ha generado la nómina para $count empleados del periodo $period.",
                'icon' => 'payments',
                'action_url' => route('erp.rrhh.nomina')
            ]);

            return $count;
        });
    }

    /**
     * Calcular acumulado de prestaciones sociales (Simplificado LOTTT).
     * Se asume 5 días por mes trabajado.
     */
    public function calculateAccruedBenefits(Employee $employee)
    {
        $fechaIngreso = Carbon::parse($employee->fecha_ingreso);
        $mesesTrabajados = $fechaIngreso->diffInMonths(now());
        
        $diasAcumulados = $mesesTrabajados * 5; 
        $salarioDiario = $employee->salario / 30;
        
        return [
            'meses' => $mesesTrabajados,
            'dias' => $diasAcumulados,
            'monto' => round($diasAcumulados * $salarioDiario, 2)
        ];
    }
}
