<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleCostosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallecosto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_costo');
            $table->string('descripcion');
            $table->date('fecha');
            $table->float('monto');
            $table->foreign('id_costo')->references('id')->on('costo')->onDelete('cascade')->onUpdate('cascade');
            /* $table->timestamps(); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallecosto');
    }
}
