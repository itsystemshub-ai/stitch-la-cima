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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // Datos del Access (CIMA2026.accdb)
            $table->string('codigo_oem', 100)->unique()->comment('Código OEM del fabricante');
            $table->string('codigo_interno', 100)->nullable()->comment('SKU o Código Interno de la empresa');
            $table->string('nombre', 255)->comment('Descripción o Nombre del repuesto');
            $table->string('marca', 100)->nullable();
            $table->string('categoria', 100)->nullable();
            
            // Stock y Cantidades con decimales por si acaso (ej. litros o kilos) o enteros (piezas)
            $table->decimal('stock_actual', 10, 2)->default(0);
            $table->decimal('stock_minimo', 10, 2)->default(0);
            
            // Precios y Costos
            $table->decimal('costo_compra', 15, 2)->default(0);
            $table->decimal('precio_mayor', 15, 2)->default(0); // B2B
            $table->decimal('precio_detal', 15, 2)->default(0); // B2C
            
            // Estado y extras
            $table->boolean('activo')->default(true);
            $table->string('ubicacion_almacen', 255)->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
