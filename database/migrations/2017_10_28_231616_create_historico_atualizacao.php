<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricoAtualizacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historico_atualizacao', function (Blueprint $table) {
            //
            $table->integer('id');
            $table->integer('adm_id');
            $table->date('data_atualizacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('historico_atualizacao', function (Blueprint $table) {
            //
        });
    }
}
