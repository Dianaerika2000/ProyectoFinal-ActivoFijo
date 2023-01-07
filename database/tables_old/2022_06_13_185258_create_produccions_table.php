<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produccion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_formula');
            $table->date('fecha');
            $table->float('aportepatronal');
            $table->float('beneficiosocial');
            $table->unsignedBigInteger('tacho');
            $table->unsignedBigInteger('tachodiario');
            $table->unsignedBigInteger('diaslaboral');
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
        Schema::dropIfExists('produccion');
    }
}
