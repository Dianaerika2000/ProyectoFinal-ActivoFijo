<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuesto', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_costo');
            $table->date('fecha');
            $table->string('nombre');
            $table->float('cantidadlote');
            $table->float('montototal');
            $table->string('estado');
            $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_costo')->references('id')->on('costo')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('presupuesto');
    }
}
