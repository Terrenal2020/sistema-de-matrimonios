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
        Schema::create('comprometidos', function (Blueprint $table) {
            $table->id();
            $table->string('clave');
            $table->string('NombreEsposo');
            $table->string('ApellidoP');
            $table->string('ApellidoM');
            $table->string('NombreEsposa');
            $table->string('ApellidoPa');
            $table->string('ApellidoMa');
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
        Schema::dropIfExists('comprometidos');
    }
};
