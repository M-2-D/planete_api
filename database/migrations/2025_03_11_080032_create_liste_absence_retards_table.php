<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('liste_absence_retards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('eleve_id')->constrained()->onDelete('cascade');
            $table->string('type'); 
            $table->string('date'); 
            $table->string('heure'); 
            $table->string('discipline'); 
            $table->string('justification'); 
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('liste_absence_retards');
    }
};