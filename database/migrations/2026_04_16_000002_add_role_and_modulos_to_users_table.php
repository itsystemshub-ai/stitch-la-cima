<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('trabajador')->nullable()->after('password');
            }
            if (! Schema::hasColumn('users', 'is_active')) {
                $table->tinyInteger('is_active')->default(1)->after('role');
            }
            if (! Schema::hasColumn('users', 'modulos')) {
                $table->json('modulos')->nullable()->after('is_active');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'is_active', 'modulos']);
        });
    }
};
