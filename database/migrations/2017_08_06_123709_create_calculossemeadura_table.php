<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalculossemeaduraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculos_semeadura', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sem_id');
            $table->decimal('qtde_sementes_metro', 8, 2);
            $table->decimal('peso_minimo_sementes_ha', 8, 2);
            $table->decimal('peso_maximo_sementes_ha', 8, 2);
            $table->decimal('peso_minimo_sementes_alq', 8, 2);
            $table->decimal('peso_maximo_sementes_alq', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calculos_semeadura', function (Blueprint $table) {
            //
        });
    }
}
