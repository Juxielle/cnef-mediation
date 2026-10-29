<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mediation_saisine_trimestres', function (Blueprint $table) {
            $table->id();
            $table->string('periode');
            $table->unsignedInteger('saisines');
            $table->unsignedInteger('resolus');
            $table->unsignedInteger('ordre')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mediation_saisine_trimestres');
    }
};

