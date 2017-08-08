<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nome', 45);
          $table->string('razao_social', 45);
          $table->string('ramo_atividade', 45);
          $table->string('cnpj', 15);
          $table->string('email', 45);
          $table->string('site', 45);
          $table->string('telefone', 15);
          $table->string('rua', 45);
          $table->string('cidade', 45);
          $table->string('bairro', 45);
          $table->string('cep', 10);
          $table->integer('numero');
          $table->char('uf', 2);
          $table->char('status', 1);
          $table->string('logo', 1000);
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
        Schema::table('empresa', function (Blueprint $table) {
            //
        });
    }
}
