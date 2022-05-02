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
            $table->unsignedBigInteger('origen_id');
            $table->unsignedBigInteger('destino_id');
            $table->double('valor');
            $table->foreign('origen_id')->references('id')->on('cuenta');
            $table->foreign('destino_id')->references('id')->on('cuenta');
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
            $table->dropForeign(['origen_id']);
            $table->dropForeign(['destino_id']);
        });
        Schema::dropIfExists('transaccion');
    }
};
