<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcorrenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('apartamento_id');
            $table->unsignedBigInteger('infracao_id');
            $table->unsignedInteger('reclamante_id');
            $table->unsignedBigInteger('penalidade')->nullable();
            $table->unsignedBigInteger('tipo')->nullable();
            $table->decimal('multa',10,2)->default(0);
            $table->unsignedBigInteger('autor_id')->nullable();
            $table->text('detalhes')->nullable();
            $table->date('data')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ocorrencias');
    }
}
