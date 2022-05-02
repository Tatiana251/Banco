<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaccion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cuentaOrigen');
            $table->unsignedBigInteger('cuentaDestino');
            $table->double('valorTransferencia');
            $table->foreign('cuentaOrigen')->references('id')->on('cuenta');
            $table->foreign('cuentaDestino')->references('id')->on('cuenta');
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
        Schema::table('transaccion', function (Blueprint $table) {
            $table->dropForeign(['cuentaOrigen']);
            $table->dropForeign(['cuentaDestino']);
        });
        Schema::dropIfExists('transaccion');
    }
};
