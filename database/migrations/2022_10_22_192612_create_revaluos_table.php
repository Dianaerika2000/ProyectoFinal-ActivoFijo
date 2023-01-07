<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevaluosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revaluos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion')->nullable(true);
            $table->date('fechaRevaluo');
            $table->double('costo')->nullable(true);
            $table->double('costoActualizado')->nullable(true);
            $table->double('depreciacionAcumulada')->nullable(true);
            $table->double('valorNeto');
            $table->integer('idInmueble');

            //Relacion
            $table->foreign('idInmueble')->references('id')->on('inmuebles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revaluos');
    }
}
