<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('apartamento_id');
            $table->boolean('agendado')->default(0);
            $table->boolean('morador_presente')->default(0);
            $table->dateTime('dh_entrada')->nullable(true);
            $table->dateTime('dh_saida')->nullable(true);
            $table->string('tipo_autorizacao')->nullable();
            $table->string('nome_visitante')->nullable();
            $table->string('rg_visitante')->nullable();
            $table->text('detalhes')->nullable();
            $table->unsignedBigInteger('autorizado_por');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitas');
    }
}
