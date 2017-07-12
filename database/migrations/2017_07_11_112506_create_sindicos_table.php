<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSindicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sindicos', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_moradors')->unsigned();
          $table->date('data_posse');
          $table->date('data_saida')->nullable();
          $table->timestamps();
          $table->foreign('id_moradors')->references('id')->on('moradors')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sindicos');
    }
}
