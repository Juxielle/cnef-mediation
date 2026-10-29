<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mediation_litiges', function (Blueprint $table) {
            $table->id();
            $table->string('nature');
            $table->unsignedInteger('dossiers');
            $table->unsignedInteger('resolus');
            $table->unsignedInteger('taux');
            $table->string('tendance');
            $table->string('tendance_niveau')->default('g');
            $table->unsignedInteger('ordre')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mediation_litiges');
    }
};

