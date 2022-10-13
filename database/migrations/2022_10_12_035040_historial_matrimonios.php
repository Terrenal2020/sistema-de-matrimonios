<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historialMatrimonios', function (Blueprint $table) {
            $table->id();
            $table->string('clave');
            $table->string('Nombre');
            $table->string('ApellidoP');
            $table->string('ApellidoM');
            $table->string('NombreP1');
            $table->string('ApellidoP2');
            $table->string('ApellidoM2');
            $table->string('estatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historialMatrimonios');

    }
};
