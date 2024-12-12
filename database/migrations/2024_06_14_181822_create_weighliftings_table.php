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
        Schema::create('weighliftings', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id'); // Clave foránea a la tabla users 

            $table->string('nombre');
            $table->string('descripción');
            $table->float('peso');
            $table->float('repeticionMaxima');
            $table->date('fecha');
            $table->timestamps();

            // Definición de la clave foránea
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weighliftings');
    }
};
