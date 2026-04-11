<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('rif', 50)->unique()->comment('Cédula o RIF del cliente');
            $table->string('razon_social', 255)->comment('Nombre o Razón Social');
            $table->string('email', 150)->nullable();
            $table->string('telefono', 100)->nullable();
            $table->text('direccion')->nullable();
            
            // Campos comerciales
            $table->string('tipo_cliente', 50)->default('Detal')->comment('Mayor o Detal');
            $table->decimal('limite_credito', 15, 2)->default(0);
            
            // Relación opcional con vendedor asignado
            $table->unsignedBigInteger('vendedor_id')->nullable();
            
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
