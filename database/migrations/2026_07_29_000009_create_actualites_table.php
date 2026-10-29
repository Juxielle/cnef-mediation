<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('actualites', function (Blueprint $table) {
            $table->id();
            $table->string('categorie'); // reglementation, communique, etude, evenement
            $table->string('badge_label');
            $table->string('badge_couleur')->default('#E8A317');
            $table->string('fond_couleur')->default('#E8F4EE');
            $table->string('titre');
            $table->text('contenu');
            $table->string('date_publication');
            $table->unsignedInteger('ordre')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('actualites');
    }
};

