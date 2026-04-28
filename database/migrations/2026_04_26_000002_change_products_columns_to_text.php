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
            $table->text('nombre')->comment('Descripción ampliada')->change();
            $table->text('marca')->nullable()->change();
            $table->text('categoria')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('nombre', 255)->change();
            $table->string('marca', 100)->nullable()->change();
            $table->string('categoria', 100)->nullable()->change();
        });
    }
};
