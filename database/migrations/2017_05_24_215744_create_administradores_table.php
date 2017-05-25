<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministradoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administradores', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nome', 45);
          $table->string('login', 45);
          $table->string('senha', 45);
          $table->string('email', 50);
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
        Schema::drop('administradores');
    }
}
