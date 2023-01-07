<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsables', function (Blueprint $table) {
            //$table->integer('id');
            $table->id();
            $table->integer('codigoAsignado');
            $table->string('nombre');
            $table->string('Apellido')->nullable(true);

            //Relacion
            /*
            $table->foreign('id')->references('id')->on('usuarios')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsables');
    }
}
