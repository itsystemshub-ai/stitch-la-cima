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
        Schema::create('tax_retentions', function (Blueprint $table) {
            $table->id();
            $table->string('tax_type'); // ISLR, IVA, PATENTE
            $table->string('tax_code')->unique(); // Ej: ISLR-01, IVA-75
            $table->string('description');
            $table->decimal('percentage', 5, 2); // 75.00 o 3.00
            $table->decimal('base_amount', 15, 2)->default(0); // Monto a partir del cual se retiene (UT o Bs)
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_retentions');
    }
};
