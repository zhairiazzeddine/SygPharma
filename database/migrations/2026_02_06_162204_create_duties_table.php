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
        Schema::create('duties', function (Blueprint $table) {
    $table->id();

    $table->foreignId('pharmacy_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->dateTime('starts_at');
    $table->dateTime('ends_at');

    $table->string('duty_type'); 
    // night | holiday | weekend

    $table->foreignId('created_by')
        ->constrained('users')
        ->restrictOnDelete();

    $table->timestamps();

    $table->index(['starts_at', 'ends_at']);
    $table->index('pharmacy_id');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('duties');
    }
};
