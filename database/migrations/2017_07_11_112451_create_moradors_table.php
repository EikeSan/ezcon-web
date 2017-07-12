<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('moradors', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_users')->unsigned();
          $table->integer('id_apartamentos')->unsigned();
          $table->timestamps();
          $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('id_apartamentos')->references('id')->on('apartamentos')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moradors');
    }
}
