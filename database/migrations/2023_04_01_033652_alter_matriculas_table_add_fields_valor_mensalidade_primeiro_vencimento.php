<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMatriculasTableAddFieldsValorMensalidadePrimeiroVencimento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matriculas', function (Blueprint $table) {
            $table->decimal('valor_mensalidade', 15, 2)->after('quantidade_meses');
            $table->date('vencimento_primeira_parcela')->after('valor_mensalidade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matriculas', function (Blueprint $table) {
            $table->dropColumn(['valor_mensalidade', 'vencimento_primeira_parcela']);
        });
    }
}
