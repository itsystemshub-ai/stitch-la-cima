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
            $table->string('foto_path')->nullable()->after('id');
            $table->string('fabricante')->nullable()->after('categoria');
            $table->string('material')->nullable()->after('marca');
            $table->string('espesor')->nullable()->after('material');
            $table->string('medidas')->nullable()->after('nombre');
            $table->date('fecha_incorporacion')->nullable()->after('ubicacion_almacen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['foto_path', 'fabricante', 'material', 'espesor', 'medidas', 'fecha_incorporacion']);
        });
    }
};
