<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'region')) {
                $table->string('region')->nullable()->after('cedula_rif');
            }
            if (!Schema::hasColumn('users', 'estado')) {
                $table->string('estado')->nullable()->after('region');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['region', 'estado']);
        });
    }
};
