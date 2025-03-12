<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('moyenne_semestrielles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('eleve_id')->constrained()->onDelete('cascade');
            $table->string('discipline');
            $table->decimal('moy_devoirs', 5, 2);
            $table->decimal('notes_compos', 5, 2);
            $table->decimal('moyenne', 5, 2);
            $table->integer('rang');
            $table->string('appreciation');
            $table->integer('semestre');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('moyenne_semestrielles');
    }
};
