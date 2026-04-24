<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHardwarehistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gtgthardwarehistory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps(); 
            $table->integer('hardware');
            $table->integer('persona');
            $table->date('fechaevento');
            $table->string('evento', 100);
            $table->string('notas', 500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gtgthardwarehistory');
    }
}
