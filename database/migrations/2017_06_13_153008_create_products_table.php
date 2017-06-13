<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table){
          $table->increments('id');
          $table->string('name',150);
          $table->integer('number');
          $table->boolean('active');
          $table->string('image',200);
          $table->enum('category',['eletronicos','moveis','limpeza','banho']);
          $table->text('desciption');
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
        Schema::dropIfExists('products');
    }
}
