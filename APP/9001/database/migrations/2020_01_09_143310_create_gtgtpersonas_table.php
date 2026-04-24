<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGtgtpersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gtgtpersonas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->string('departamento', 50);
            $table->string('puesto', 50);
            $table->string('telcel', 50);
            $table->string('dpi', 30)->unique();
            $table->string('direccion', 100)->nullable();
            $table->string('personaemergencia', 100)->nullable();
            $table->string('telcelemergencia', 50)->nullable();
            $table->string('jefeinmediato', 100)->nullable();
            $table->string('mailgt', 50);
            $table->string('mailpe', 50)->nullable();
            $table->string('foto', 50)->nullable();
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gtgtpersonas');
    }
}
