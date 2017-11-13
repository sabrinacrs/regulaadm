<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemeadurasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semeaduras', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('quilos_sementes');
            $table->decimal('germinacao');
            $table->decimal('metros_lineares');
            $table->integer('talhao_id');
            $table->integer('cultivar_id');
            $table->integer('epoca_semeadura_id');
            $table->date('data');
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
        // Schema::table('semeaduras', function (Blueprint $table) {
        //     //
        // });
    }
}
