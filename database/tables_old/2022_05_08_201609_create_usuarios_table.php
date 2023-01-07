<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();//unsignetBigInteger
            //$table->unsignedBigInteger('id_acceso');
            $table->unsignedBigInteger('id_rol');
            $table->string('u_nombre');
            $table->string('u_app');
            $table->unsignedBigInteger('u_ci')->unique();
            $table->char('u_sex');
            $table->string('u_dir');
            $table->unsignedBigInteger('u_tel');
            $table->string('email')->unique();
            $table->string('password');
            //$table->foreign('id_acceso')->references('id')->on('acceso')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_rol')->references('id')->on('rol')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('usuario');
    }
}
