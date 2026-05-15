<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            if (!Schema::hasColumn('employees', 'departamento')) {
                $table->string('departamento')->nullable()->after('cargo');
            }
            // Hacer cedula nullable para permitir importaciones sin cedula
            $table->string('cedula')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('departamento');
            $table->string('cedula')->nullable(false)->change();
        });
    }
};
