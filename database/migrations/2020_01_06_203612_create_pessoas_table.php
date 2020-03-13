<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('telefone')->unique();
            $table->boolean('notificar')->default(1);
            $table->string('razao_social')->nullable();
            $table->unsignedBigInteger('tipo')->default(1);
            $table->unsignedBigInteger('tipo_cadastro')->nullable();
            $table->unsignedBigInteger('dependente_id')->nullable();
            $table->string('rg')->nullable(true)->unique();
            $table->string('cpf')->nullable(true)->unique();
            $table->string('cnpj')->nullable(true)->unique();
            $table->boolean('endereco_externo')->default(0);
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->string('complemento')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}
