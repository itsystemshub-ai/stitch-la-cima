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
        Schema::create('accounting_daily_summaries', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('account_id')->index(); // ID o Codigo de la cuenta contable
            $table->decimal('debit_total', 15, 2)->default(0);
            $table->decimal('credit_total', 15, 2)->default(0);
            $table->timestamps();

            // Evitar duplicados para un mismo dia y cuenta
            $table->unique(['date', 'account_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounting_daily_summaries');
    }
};
