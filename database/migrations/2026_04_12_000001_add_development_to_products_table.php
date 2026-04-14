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
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('is_development')->default(false)->after('activo')->comment('Indica si el producto está en fase de desarrollo');
            $table->text('development_notes')->nullable()->after('is_development')->comment('Notas técnicas para items en desarrollo');
            $table->string('thumbnail')->nullable()->after('nombre');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['is_development', 'development_notes', 'thumbnail']);
        });
    }
};
