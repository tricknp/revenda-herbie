<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarcasOficinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcas_oficinas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('marca_id')->unsigned();

            $table->foreign('marca_id')
                  ->references('id')
                  ->on('marcas')
                  ->onDelete('restrict');           

            $table->integer('oficina_id')->unsigned();

            $table->foreign('oficina_id')
                    ->references('id')->on('oficinas')
                    ->onDelete('restrict');           
            
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
        Schema::dropIfExists('marcas_oficinas');
    }
}
