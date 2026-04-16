<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('customers', 'user_id')) {
            Schema::table('customers', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id')->nullable()->after('id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        }

        if (Schema::hasColumn('customers', 'email') && Schema::hasColumn('customers', 'password')) {
            $customers = Schema::hasColumn('customers', 'email')
                ? DB::table('customers')->whereNotNull('email')->get()
                : collect();

            foreach ($customers as $customer) {
                $userId = DB::table('users')->insertGetId([
                    'name' => $customer->razon_social ?? 'Cliente',
                    'email' => $customer->email ?? '',
                    'password' => $customer->password ?? Hash::make('cliente123'),
                    'role' => 'cliente',
                    'is_active' => $customer->activo ?? 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                DB::table('customers')->where('id', $customer->id)->update(['user_id' => $userId]);
            }

            Schema::table('customers', function (Blueprint $table) {
                $table->dropColumn(['email', 'password', 'remember_token']);
            });
        }
    }

    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token', 100)->nullable();
        });

        $linked = DB::table('customers')
            ->join('users', 'customers.user_id', '=', 'users.id')
            ->select('customers.id', 'users.email', 'users.password')
            ->get();

        foreach ($linked as $item) {
            DB::table('customers')->where('id', $item->id)->update([
                'email' => $item->email,
                'password' => $item->password,
            ]);
        }

        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id']);
        });
    }
};
