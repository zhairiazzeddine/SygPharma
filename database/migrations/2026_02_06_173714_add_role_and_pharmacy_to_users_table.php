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
         Schema::table('users', function (Blueprint $table) {
        $table->string('role')->after('password');

        $table->foreignId('pharmacy_id')
            ->nullable()
            ->after('role')
            ->constrained('pharmacies')
            ->nullOnDelete();

        $table->index('role');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('users', function (Blueprint $table) {
        $table->dropForeign(['pharmacy_id']);
        $table->dropColumn(['role', 'pharmacy_id']);
    });
    }
};
