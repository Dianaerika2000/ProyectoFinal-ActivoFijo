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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->char('genero')->nullable(true);
            $table->string('nacionalidad')->nullable(true);
            $table->string('ci');
            $table->integer('celular')->nullable(true);
            $table->string('direccion')->nullable(true);
            $table->string('email');
            $table->string('foto')->nullable(true);
            $table->string('password');
            $table->string('tipo_usuario')->nullable(true);
            $table->string('letra')->nullable(true);
            $table->string('color')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
