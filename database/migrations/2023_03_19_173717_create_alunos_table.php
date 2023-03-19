<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 60);
            $table->date('nascimento')->nullable();
            $table->enum('sexo', ['M', 'F'])->nullable();
            $table->string('cpf', 14)->nullable();
            $table->string('endereco', 80)->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('bairro', 60)->nullable();
            $table->string('complemento', 30)->nullable();
            $table->string('cep', 15)->nullable();
            $table->string('municipio', 60)->nullable();
            $table->string('uf', 20)->nullable();
            $table->string('telefone', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('responsavel', 60)->nullable();
            $table->string('parentesco', 60)->nullable();
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
        Schema::dropIfExists('alunos');
    }
}
