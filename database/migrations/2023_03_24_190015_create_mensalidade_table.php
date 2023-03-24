<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensalidadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensalidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_matricula');
            $table->integer('numero');
            $table->decimal('valor', 15, 2);
            $table->date('vencimento');
            $table->integer('situacao')->default(1);
            $table->date('data_pagamento')->nullable();
            $table->decimal('valor_pago', 15, 2)->nullable();
            $table->text('observacao')->nullable();
            $table->foreign('id_matricula')->references('id')->on('matriculas');
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
        Schema::dropIfExists('mensalidades');
    }
}
