<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdemServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ordem_servicos', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_moradors')->unsigned();
          $table->integer('id_apartamentos')->unsigned();
          $table->integer('id_funcionarios')->unsigned()->nullable();
          $table->string('descricao');
          $table->enum('status',['novo','atribuido','pendente','solucionado']);
          $table->string('solucao');
          $table->float('custo');
          $table->timestamps();
          $table->foreign('id_moradors')->references('id')->on('moradors');
          $table->foreign('id_apartamentos')->references('id')->on('apartamentos');
          $table->foreign('id_funcionarios')->references('id')->on('funcionarios');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordem_servicos');
    }
}
