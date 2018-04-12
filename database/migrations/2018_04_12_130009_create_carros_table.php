<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('modelo', 60);
            $table->integer('marca_id')->unsigned();
            $table->smallInteger('ano');
            $table->double('preco', 10, 2);
            $table->enum('combustivel', ['A', 'G', 'D', 'F']);
            $table->string('cor', 30);
            $table->timestamps();

            //define relacionamento com a tabela(model) de marcas
            $table->foreign('marca_id')->references('id')->on('macas')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carros');
    }
}
