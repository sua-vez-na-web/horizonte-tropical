<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penalidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('ocorrencia_id');
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('apto_id');
            $table->integer('nro_incidencia')->default(1);
            $table->decimal('multa',10,2)->default(0);
            $table->boolean('baixada')->default(0);
            $table->date('data_baixa')->nullable();
            $table->string('arquivo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penalidades');
    }
}
