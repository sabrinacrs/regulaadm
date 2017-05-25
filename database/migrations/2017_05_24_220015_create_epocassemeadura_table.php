<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpocassemeaduraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epocasSemeaduras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao', 45);
            $table->char('status', 1);
            $table->date('data_desativacao');
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
        Schema::drop('epocasSemeaduras');
    }
}
