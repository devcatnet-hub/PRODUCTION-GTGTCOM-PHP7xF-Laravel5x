<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHardwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gtgthardware', function (Blueprint $table) { 
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('inventario', 20)->unique();
            $table->string('tipo', 100);
            $table->string('numeroserie', 100)->unique();
            $table->string('marca', 100)->nullable();
            $table->string('modelo', 100)->nullable();
            $table->string('seriecargador', 100)->nullable();

            $table->integer('persona');
            $table->integer('status');

            $table->date('fechadecompra')->nullable();
            $table->date('fechaasignacion')->nullable();
            $table->date('fechadesasignacion')->nullable();

            $table->string('hd', 50)->nullable();
            $table->string('ram', 50)->nullable();
            $table->string('cpu', 50)->nullable();

            $table->string('led', 50)->nullable();
            $table->integer('tled')->nullable();
            $table->integer('fled')->nullable();

            $table->integer('tkey')->nullable();
            $table->integer('fkey')->nullable();

            $table->integer('tmouse')->nullable();
            $table->integer('fmouse')->nullable();

            $table->integer('thd')->nullable();
            $table->integer('fhd')->nullable();

            $table->integer('tram')->nullable();
            $table->integer('fram')->nullable(); 

            $table->integer('tcpu')->nullable();
            $table->integer('fcpu')->nullable(); 

            $table->integer('tboard')->nullable();
            $table->integer('fboard')->nullable();
            
            $table->integer('tlector',)->nullable();
            $table->string('lector', 50)->nullable();
            $table->integer('flector')->nullable();
            
            $table->integer('tcargador')->nullable();
            $table->integer('fcargador')->nullable();

            $table->integer('tred')->nullable();
            $table->integer('fred')->nullable();
            $table->string('red', 50)->nullable();

            $table->integer('tsound')->nullable();
            $table->integer('fsound')->nullable();

            $table->integer('tvideo')->nullable();
            $table->integer('fvideo')->nullable();

            $table->integer('tprinter')->nullable();
            $table->integer('fprinter')->nullable();

            $table->integer('tbocinas')->nullable();
            $table->integer('fbocinas')->nullable();

            $table->integer('tcañonera')->nullable();
            $table->integer('fcañonera')->nullable();

            $table->string('otro', 500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gtgthardware');
    }
}
