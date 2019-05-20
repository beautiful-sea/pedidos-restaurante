<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarmitexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marmitex', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('material');
            $table->string('nome');
            $table->string('tamanho');
            $table->string('marca');
            $table->string('valor_unitario');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marmitex');
    }
}
