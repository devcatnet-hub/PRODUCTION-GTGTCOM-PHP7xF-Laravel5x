<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectscategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gtgtobjectcategory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('categoria', 20)->unique();
            $table->string('components');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gtgtobjectcategory');
    }
}
