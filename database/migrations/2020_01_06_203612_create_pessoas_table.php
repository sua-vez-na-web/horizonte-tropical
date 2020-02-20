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
            $table->enum('tipo', ['FISICA', 'JURIDICA'])->default('FISICA');
            $table->enum('tipo_cadastro', ['PROPRIETARIO', 'INQUILINO', 'FAMILIAR','FUNCIONARIO'])->default('PROPRIETARIO');
            $table->string('rg')->nullable(true)->unique();
            $table->string('cpf')->nullable(true)->unique();
            $table->string('cnpj')->nullable(true)->unique();
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
