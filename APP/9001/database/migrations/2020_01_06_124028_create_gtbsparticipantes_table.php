<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGtbsparticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gtbsparticipantes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps(); 
            $table->string('nombre', 100);
            $table->string('cargo', 100);            
            $table->string('empresa', 100);
            $table->string('nit', 20)->nullable();
            $table->string('dirfactura', 100)->nullable();
            $table->string('dirfacturaenvio', 100)->nullable();
            $table->string('telefono', 100);
            $table->string('email', 100);
            $table->string('observaciones')->nullable();
            $table->integer('tema');
            $table->boolean('confirmado')->nullable();
            $table->boolean('pagado')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gtbsparticipantes');
    }
}
