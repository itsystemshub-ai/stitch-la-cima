<div class="bg-white rounded-lg shadow-sm border border-stone-200 overflow-hidden">
    <!-- Wizard Header -->
    <div class="px-6 py-4 border-b border-stone-200 bg-stone-50 flex justify-between items-center">
        <h3 class="text-lg font-semibold text-stone-800">Wizard de Nómina</h3>
        <span class="text-sm text-stone-500">Paso {{ $currentStep }} de {{ $totalSteps }}</span>
    </div>

    <!-- Wizard Forms -->
    <div class="p-6">
        @if ($currentStep === 1)
            <div class="space-y-4">
                <h4 class="font-medium text-stone-700">Paso 1: Salarios Base</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($employees as $emp)
                    <div class="flex flex-col">
                        <label class="text-sm text-stone-600 font-medium">{{ $emp->name }}</label>
                        <input type="number" step="0.01" wire:model="baseSalaries.{{ $emp->id }}" class="mt-1 block w-full rounded-md border-stone-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm">
                        @error('baseSalaries.'.$emp->id) <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    @endforeach
                </div>
            </div>
        @elseif ($currentStep === 2)
            <div class="space-y-4">
                <h4 class="font-medium text-stone-700">Paso 2: Bonos y Deducciones Extraordinarias</h4>
                <table class="min-w-full divide-y divide-stone-200">
                    <thead>
                        <tr>
                            <th class="px-3 py-2 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">Empleado</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">Bonos ($)</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">Deducciones ($)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-200">
                        @foreach($employees as $emp)
                        <tr>
                            <td class="px-3 py-2 text-sm font-medium text-stone-900">{{ $emp->name }}</td>
                            <td class="px-3 py-2">
                                <input type="number" step="0.01" wire:model="bonuses.{{ $emp->id }}" class="block w-full rounded-md border-stone-300 shadow-sm">
                            </td>
                            <td class="px-3 py-2">
                                <input type="number" step="0.01" wire:model="deductions.{{ $emp->id }}" class="block w-full rounded-md border-stone-300 shadow-sm">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif ($currentStep === 3)
            <div class="space-y-4">
                <h4 class="font-medium text-stone-700">Paso 3: Revisión y Aprobación</h4>
                <div class="bg-amber-50 border-l-4 border-amber-400 p-4 mb-4">
                    <p class="text-sm text-amber-700">Verifique los totales antes de emitir la nómina.</p>
                </div>
                <div class="grid grid-cols-3 gap-4 font-mono text-sm bg-stone-100 p-4 rounded text-right">
                    <div class="font-bold text-left">Empleado</div>
                    <div class="font-bold">Total Asignaciones</div>
                    <div class="font-bold">Total Pagar</div>
                    @foreach($employees as $emp)
                        <div class="text-left border-t border-stone-200 pt-2 mt-2">{{ $emp->name }}</div>
                        <div class="border-t border-stone-200 pt-2 mt-2">${{ number_format(($baseSalaries[$emp->id] ?? 0) + ($bonuses[$emp->id] ?? 0), 2) }}</div>
                        <div class="border-t border-stone-200 pt-2 mt-2 font-bold">${{ number_format(($baseSalaries[$emp->id] ?? 0) + ($bonuses[$emp->id] ?? 0) - ($deductions[$emp->id] ?? 0), 2) }}</div>
                    @endforeach
                </div>
            </div>
        @elseif ($currentStep === 4)
            <div class="text-center py-8">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                    <i class="fas fa-check text-green-600"></i>
                </div>
                <h3 class="text-lg leading-6 font-medium text-stone-900">Nómina Procesada Exitosamente</h3>
                <p class="text-sm text-stone-500 mt-2">Los recibos de pago han sido generados y los balances actualizados.</p>
                <button wire:click="mount" class="mt-4 px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-amber-600 hover:bg-amber-700">
                    Calculo Nuevo
                </button>
            </div>
        @endif
    </div>

    <!-- Wizard Footer / Navigation -->
    @if($currentStep < 4)
    <div class="px-6 py-4 border-t border-stone-200 bg-stone-50 flex justify-between">
        @if ($currentStep > 1)
            <button wire:click="previousStep" class="inline-flex items-center px-4 py-2 border border-stone-300 text-sm font-medium rounded-md text-stone-700 bg-white hover:bg-stone-50">
                Atrás
            </button>
        @else
            <div></div> <!-- Spacer -->
        @endif

        @if ($currentStep < $totalSteps)
            <button wire:click="nextStep" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-stone-900 hover:bg-stone-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-900">
                Siguiente
            </button>
        @else
            <button wire:click="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                Procesar Nómina
            </button>
        @endif
    </div>
    @endif
</div>
