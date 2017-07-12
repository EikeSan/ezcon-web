<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('funcionarios', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_users')->unsigned();
          $table->string('funcao');
          $table->date('data_admissao');
          $table->date('data_demissao')->nullable();
          $table->timestamps();
          $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
