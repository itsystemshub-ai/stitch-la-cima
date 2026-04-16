<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('nombre');
            $table->string('tipo'); // Activo, Pasivo, Patrimonio, Ingreso, Costo, Gasto
            $table->string('nivel'); // 1, 2, 3, 4
            $table->foreignId('parent_id')->nullable()->constrained('accounts')->onDelete('set null');
            $table->boolean('movimiento')->default(true);
            $table->boolean('auxiliar')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};