<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * TIPOS DE SERVICIO
     */
    public function up(): void
    {
        Schema::create('tiposervicio', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiposervicio');
    }
};
