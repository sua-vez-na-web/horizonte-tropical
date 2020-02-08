<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorrespondenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('correspondencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->uuid("uuid")->nullable();
            $table->dateTime('data_recebimento')->nullable();
            $table->dateTime('data_entrega')->nullable();
            $table->enum("tipo",["AGUA","LUZ","INTERNET","OUTROS"])->default("OUTROS")->nullable();
            $table->enum("status",["ENTREGUE","PENDENTE DE ENTREGA"])->default("PENDENTE DE ENTREGA");
            $table->unsignedBigInteger('apartamento_id');
            $table->text('detalhes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('correspondencias');
    }
}
