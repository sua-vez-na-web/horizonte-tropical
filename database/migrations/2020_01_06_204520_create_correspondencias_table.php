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
            $table->string("tipo")->nullable();
            $table->unsignedBigInteger("status")->default(0);
            $table->unsignedBigInteger('apartamento_id');
            $table->unsignedBigInteger('recebedor_id');
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
