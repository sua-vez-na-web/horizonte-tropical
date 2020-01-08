<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('bloco_id');
            $table->unsignedBigInteger('proprietario_id');
            $table->string('codigo')->unique();
            $table->integer('garagens')->default(1)->nullable();
            $table->boolean('prop_residente')->default(1);
            $table->enum('status',['ALUGADO','DESOCUPADO'])->default('ALUGADO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartamentos');
    }
}
