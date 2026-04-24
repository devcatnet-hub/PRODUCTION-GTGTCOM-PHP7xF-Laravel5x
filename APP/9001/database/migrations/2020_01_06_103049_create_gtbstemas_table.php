<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGtbstemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gtbstemas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps(); 
            $table->date('fecha');
            $table->string('tema', 300);
            $table->string('responsable', 100);
            $table->integer('participantes');
            $table->string('lugar', 100)->nullable();
            $table->string('hora', 100)->nullable();
            $table->string('costo', 100)->nullable();
            $table->string('nota')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gtbstemas');
    }
}
