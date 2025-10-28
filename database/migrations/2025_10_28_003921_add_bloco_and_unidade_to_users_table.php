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
        $table->string('bloco')->nullable(); // Ex: Torre A, Bloco 1, Casa 15
        $table->string('unidade')->nullable(); // Ex: 101, 203, Apto
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('bloco');
        $table->dropColumn('unidade');
    });
}
};
