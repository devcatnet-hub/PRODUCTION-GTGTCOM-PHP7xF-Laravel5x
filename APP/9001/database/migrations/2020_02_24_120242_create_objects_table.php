<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gtgtobjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('categoria');
            $table->integer('persona');
            $table->string('icono', 50);
            $table->string('nombre', 50);
            $table->string('notas', 500)->nullable();
            $table->string('documento', 100)->nullable();
            $table->string('foto', 100)->nullable();
            $table->string('dato', 100)->nullable();
            $table->decimal('valor', 8, 2)->nullable();
            $table->decimal('porcentaje', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gtgtobjects');
    }
}
