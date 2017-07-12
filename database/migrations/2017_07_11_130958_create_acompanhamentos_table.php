<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcompanhamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('acompanhamentos', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_ordem_servicos')->unsigned();
          $table->string('acompanhamento')->nullable();
          $table->timestamps();
          $table->foreign('id_ordem_servicos')->references('id')->on('ordem_servicos')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acompanhamentos');
    }
}
