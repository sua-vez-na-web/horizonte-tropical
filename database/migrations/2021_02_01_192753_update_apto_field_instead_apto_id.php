<?php

use App\Correspondencia;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAptoFieldInsteadAptoId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('correspondencias', function (Blueprint $table) {

            $correspondencias = Correspondencia::withTrashed()->get();

            foreach ($correspondencias as $c) {
                $c->apto = $c->apartamento->apto;
                $c->bloco = $c->apartamento->bloco_id;
                $c->save();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('correspondencias', function (Blueprint $table) {

            $correspondencias = Correspondencia::all();

            foreach ($correspondencias as $c) {
                $c->apto = null;
                $c->save();
            }
        });
    }
}
