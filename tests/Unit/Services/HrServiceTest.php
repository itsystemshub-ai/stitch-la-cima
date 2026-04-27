<?php

namespace Tests\Unit\Services;

use App\Models\Employee;
use App\Models\Payroll;
use App\Models\User;
use App\Services\HrService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HrServiceTest extends TestCase
{
    use RefreshDatabase;

    private HrService $service;
    private Employee $employee;
    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new HrService();
        $this->admin = User::factory()->create(['role' => 'admin']);
        
        $this->employee = Employee::create([
            'cedula' => 'V-12345678',
            'nombre' => 'Juan',
            'apellido' => 'Perez',
            'email' => 'juan@example.com',
            'cargo' => 'Vendedor',
            'salario' => 500,
            'fecha_ingreso' => now()->subMonths(6),
            'estatus' => 'ACTIVO'
        ]);
    }

    /** @test */
    public function it_can_generate_payroll_for_active_employees()
    {
        $count = $this->service->generatePayroll('ABRIL-2026', $this->admin->id);

        $this->assertEquals(1, $count);
        $this->assertDatabaseHas('payrolls', [
            'employee_id' => $this->employee->id,
            'periodo' => 'ABRIL-2026',
            'salario_base' => 500,
            'total_pagar' => 480 // 500 - 4% deducciones
        ]);
    }

    /** @test */
    public function it_calculates_accrued_benefits_correctly()
    {
        $benefits = $this->service->calculateAccruedBenefits($this->employee);

        $this->assertEquals(6, $benefits['meses']);
        $this->assertEquals(30, $benefits['dias']); // 6 meses * 5 dias
        
        $salarioDiario = 500 / 30;
        $montoEsperado = round(30 * $salarioDiario, 2);
        
        $this->assertEquals($montoEsperado, $benefits['monto']);
    }
}
