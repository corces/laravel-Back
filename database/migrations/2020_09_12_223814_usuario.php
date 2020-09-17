<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('usuarios')){
			Schema::create('usuarios', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('nombre')->nullable();
				$table->string('rut')->nullable();
				$table->string('telefono')->nullable();
				$table->string('correo')->nullable();
				$table->boolean('confirmado')->nullable();
			});
		}

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuarios');
    }
}
