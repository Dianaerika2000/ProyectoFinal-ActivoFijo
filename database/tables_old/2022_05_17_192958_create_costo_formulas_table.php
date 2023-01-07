<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostoFormulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costoformula', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_costo');
            $table->unsignedBigInteger('id_formula');
            $table->float('costototal');
            $table->foreign('id_costo')->references('id')->on('costo')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_formula')->references('id')->on('formula')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('costoformula');
    }
}
