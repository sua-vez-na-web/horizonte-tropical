<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsIsNotifiableIsDeniedOnOcorrenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ocorrencias', function (Blueprint $table) {
            //$table->boolean('is_notifiabled')->default(0);
            $table->uuid('uuid');
            $table->boolean('is_denied')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ocorrencias', function (Blueprint $table) {
            //$table->dropColumn('is_notifiabled');
            $table->dropColumn('uuid');
            $table->dropColumn('is_denied');
        });
    }
}
