<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCultivareshasepocasemeaduraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cultivares_has_epocasemeadura', function (Blueprint $table) {
          $table->integer('cult_id');
          $table->integer('ep_id');
          $table->decimal('plantas_ha', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cultivares_has_epocasemeadura', function (Blueprint $table) {
            //
        });
    }
}
