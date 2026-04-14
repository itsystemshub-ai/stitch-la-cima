<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('numero_orden', 50)->unique();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('vendedor_id')->nullable();
            
            $table->decimal('subtotal', 15, 2)->default(0);
            $table->decimal('impuestos', 15, 2)->default(0);
            $table->decimal('total', 15, 2)->default(0);
            
            $table->string('estado', 50)->default('Pendiente')->comment('Pendiente, Pagado, Despachado, Cancelado');
            $table->date('fecha_emision');
            $table->date('fecha_vencimiento')->nullable();
            
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('restrict');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
