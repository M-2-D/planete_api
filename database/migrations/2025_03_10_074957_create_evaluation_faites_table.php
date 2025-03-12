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
        Schema::create('evaluation_faites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('eleve_id')->constrained()->onDelete('cascade');
            $table->string('nom'); 
            $table->decimal('note', 5, 2); // Note avec 2 décimales
            $table->date('date'); // Format date
            $table->string('heure'); // Format heure
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation_faites');
    }
};