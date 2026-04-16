<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            // Autenticación
            $table->string('password')->nullable()->after('email');
            $table->timestamp('verified_at')->nullable()->after('password');
            $table->string('remember_token', 100)->nullable()->after('verified_at');

            // Actualizar tipo_cliente para soporta B2B/B2C
            $table->enum('tipo_cliente', ['Mayor', 'Detal', 'B2B', 'B2C'])->default('Detal')->change();

            // Campos adicionales para portal cliente
            $table->string('avatar', 255)->nullable()->after('remember_token');
            $table->timestamp('ultimo_login')->nullable()->after('avatar');
        });
    }

    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn(['password', 'verified_at', 'remember_token', 'avatar', 'ultimo_login']);
            $table->string('tipo_cliente', 50)->default('Detal')->change();
        });
    }
};
