<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invites', function (Blueprint $table) {
            $table->id();
            // Chave estrangeira para o condomínio que o convite se refere
            $table->foreignId('condominio_id')->constrained()->onDelete('cascade'); 
            
            // O token de convite (string única e longa)
            $table->string('token', 64)->unique(); 
            
            // Data de expiração do convite
            $table->timestamp('expires_at'); 
            
            // Se o convite já foi usado
            $table->boolean('used')->default(false); 

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invites');
    }
};