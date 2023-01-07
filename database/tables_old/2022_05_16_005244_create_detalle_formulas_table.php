<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleFormulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleformula', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_insumo');
            $table->unsignedBigInteger('id_formula');
            $table->float('cantidad');
            $table->foreign('id_insumo')->references('id')->on('insumo')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_formula')->references('id')->on('informe')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('detalleformula');
    }
}
