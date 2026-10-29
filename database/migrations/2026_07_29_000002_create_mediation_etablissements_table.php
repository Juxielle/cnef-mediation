<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mediation_etablissements', function (Blueprint $table) {
            $table->id();
            $table->string('categorie');
            $table->string('nom');
            $table->string('sigle')->nullable();
            $table->boolean('actif')->default(true);
            $table->unsignedInteger('ordre')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mediation_etablissements');
    }
};

