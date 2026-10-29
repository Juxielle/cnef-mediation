<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mediateur_candidatures', function (Blueprint $table) {
            $table->id();
            $table->string('prenom');
            $table->string('nom');
            $table->string('email');
            $table->string('telephone')->nullable();
            $table->string('branche');
            $table->text('lettre_motivation')->nullable();
            $table->json('pieces_jointes')->nullable();
            $table->string('statut')->default('recue');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mediateur_candidatures');
    }
};

