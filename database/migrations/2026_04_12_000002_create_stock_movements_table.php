<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['IN', 'OUT', 'ADJUST'])->comment('Tipo de movimiento');
            $table->decimal('quantity', 10, 2);
            $table->string('reason')->nullable()->comment('Motivo del ajuste o referencia');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('reference_id')->nullable()->comment('ID de Factura o Compra relacionada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};
