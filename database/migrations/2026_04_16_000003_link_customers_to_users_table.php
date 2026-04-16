<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Añadimos el user_id
        Schema::table('customers', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
        });

        // 2. Realizamos la migración de datos de Customers Hacia Users (Evitando duplicados de RIF)
        DB::table('customers')->orderBy('id')->chunk(50, function ($customers) {
            foreach ($customers as $customer) {
                // Buscamos si existe ya un user con ese email para no fallar
                $user = DB::table('users')->where('email', $customer->email)->first();
                
                if (!$user) {
                    $userId = DB::table('users')->insertGetId([
                        'name' => $customer->razon_social,
                        'email' => $customer->email,
                        'password' => $customer->password ?? \Illuminate\Support\Facades\Hash::make('cliente123'),
                        'role' => 'cliente',
                        'is_active' => $customer->activo,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                } else {
                    $userId = $user->id;
                    DB::table('users')->where('id', $userId)->update(['role' => 'cliente']);
                }

                DB::table('customers')->where('id', $customer->id)->update(['user_id' => $userId]);
            }
        });
    }

    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
