<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosHasMarmitexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_has_marmitex', function (Blueprint $table) {
            $table->unsignedBigInteger('pedidos_id');
            $table->unsignedBigInteger('marmitex_id');
            $table->foreign('pedidos_id')->references('id')->on('pedidos');
            $table->foreign('marmitex_id')->references('id')->on('marmitex');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos_has_marmitex');
    }
}
