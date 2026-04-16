<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notas_credito', function (Blueprint $table) {
            $table->id();
            $table->string('numero_nota')->unique();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('cliente_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('vendedor_id')->nullable()->constrained('users')->onDelete('set null');
            $table->decimal('monto', 12, 2);
            $table->text('motivo')->nullable();
            $table->enum('estado', ['Pendiente', 'Aprobada', 'Rechazada', 'Aplicada'])->default('Pendiente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notas_credito');
    }
};