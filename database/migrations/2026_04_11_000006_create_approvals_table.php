<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('approvals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('approvable_id');
            $table->string('approvable_type'); // Soporte polimórfico (Order, Purchase, etc)
            $table->unsignedBigInteger('requester_id'); // Usuario que solicita
            $table->unsignedBigInteger('approver_id')->nullable(); // Usuario que aprueba/rechaza
            
            $table->string('status', 20)->default('pending')->comment('pending, approved, rejected');
            $table->text('reason')->nullable();
            
            $table->timestamps();
            
            $table->foreign('requester_id')->references('id')->on('users');
            $table->foreign('approver_id')->references('id')->on('users');
            
            $table->index(['approvable_id', 'approvable_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('approvals');
    }
};
