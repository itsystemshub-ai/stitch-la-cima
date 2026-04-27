<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HrService
{
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
            foreach ($employees as $employee) {
                // Lógica simplificada de nómina
                $salarioBase = $employee->salario;
                $bonos = 0; // Se podría extender para capturar bonos variables
                $deducciones = $salarioBase * 0.04; // Ejemplo: 4% retención ley
                $totalPagar = $salarioBase + $bonos - $deducciones;

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
