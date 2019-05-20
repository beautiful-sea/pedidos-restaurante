<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarmitexHasCarnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marmitex_has_carnes', function (Blueprint $table) {
            $table->unsignedBigInteger('marmitex_id');
            $table->unsignedBigInteger('carnes_id');
            $table->foreign('marmitex_id')->references('id')->on('marmitex');
            $table->foreign('carnes_id')->references('id')->on('carnes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marmitex_has_carnes');
    }
}
