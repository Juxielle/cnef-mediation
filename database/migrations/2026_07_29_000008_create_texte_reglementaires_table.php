<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('texte_reglementaires', function (Blueprint $table) {
            $table->id();
            $table->string('categorie'); // fondateurs, mediation, cobac, cosumaf, cima, etc.
            $table->string('type');
            $table->string('reference');
            $table->string('titre');
            $table->text('description');
            $table->string('date_publication');
            $table->string('fichier')->nullable();
            $table->unsignedInteger('ordre')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('texte_reglementaires');
    }
};

