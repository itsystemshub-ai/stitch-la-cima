<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class PayrollWizard extends Component
{
    public $currentStep = 1;
    public $totalSteps = 3;

    public $employees = [];
    public $baseSalaries = [];
    public $bonuses = [];
    public $deductions = [];

    public function mount()
    {
        // En una app real, cargaríamos empleados activos
        $this->employees = User::where('role', '!=', 'customer')->get();
        
        foreach ($this->employees as $emp) {
            $this->baseSalaries[$emp->id] = 130.00; // Base $ estandar
            $this->bonuses[$emp->id] = 0;
            $this->deductions[$emp->id] = 0;
        }
    }

    public function nextStep()
    {
        $this->validateStep();
        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function submit()
    {
        // Guardar transacciones de nómina (Phase 3 Backend Logic)
        // Emitir notificación o refrescar vista
        $this->currentStep = 4; // Final success step
    }

    public function validateStep()
    {
        if ($this->currentStep === 1) {
            $this->validate([
                'baseSalaries.*' => 'required|numeric|min:0'
            ]);
        } elseif ($this->currentStep === 2) {
            $this->validate([
                'bonuses.*' => 'nullable|numeric|min:0',
                'deductions.*' => 'nullable|numeric|min:0',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.payroll-wizard');
    }
}
