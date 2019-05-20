<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarmitexHasCardapiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marmitex_has_cardapios', function (Blueprint $table) {
            $table->unsignedBigInteger('marmitex_id');
            $table->unsignedBigInteger('cardapios_id');
            $table->foreign('marmitex_id')->references('id')->on('marmitex');
            $table->foreign('cardapios_id')->references('id')->on('cardapios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marmitex_has_cardapios');
    }
}
