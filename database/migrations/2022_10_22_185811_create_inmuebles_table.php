<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInmueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('descripcionGlosa')->nullable(true);
            $table->date('fechaAdquisicion')->nullable(true);
            $table->double('monto');
            $table->integer('idUsuario')->nullable(true);
            $table->integer('idResponsable')->nullable(true);
            $table->integer('idEstado')->nullable(true);
            $table->integer('idGrupo')->nullable(true);
            $table->integer('idDireccion')->nullable(true);
            $table->integer('idInmueble')->nullable(true);
            //$table->integer('idAdquisicion');

            //Relaciones
            $table->foreign('idUsuario')->references('id')->on('usuarios')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('idEstado')->references('id')->on('estados')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('idGrupo')->references('id')->on('grupos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('idDireccion')->references('id')->on('direcciones')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('idResponsable')->references('id')->on('responsables')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('idInmueble')->references('id')->on('inmuebles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            /*
            $table->foreign('idAdquisicion')->references('id')->on('adquisiciones')
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
        Schema::dropIfExists('inmuebles');
    }
}
