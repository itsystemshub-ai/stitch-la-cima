<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('cedula')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('cargo');
            $table->decimal('salario', 12, 2);
            $table->date('fecha_ingreso');
            $table->enum('tipo_contrato', ['Fijo', 'Indefinido', 'Por Proyecto'])->default('Indefinido');
            $table->enum('estatus', ['Activo', 'Inactivo', 'Suspendido'])->default('Activo');
            $table->text('direccion')->nullable();
            $table->timestamps();
        });

        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->string('periodo'); // 2026-04
            $table->decimal('salario_base', 12, 2);
            $table->decimal('horas_extra', 12, 2)->default(0);
            $table->decimal('bonos', 12, 2)->default(0);
            $table->decimal('deducciones', 12, 2)->default(0);
            $table->decimal('total_pagar', 12, 2);
            $table->enum('estatus', ['Pendiente', 'Procesado', 'Pagado'])->default('Pendiente');
            $table->date('fecha_pago')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payrolls');
        Schema::dropIfExists('employees');
    }
};