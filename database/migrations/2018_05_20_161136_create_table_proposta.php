<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProposta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propostas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->integer('id_veiculo')->unsigned();
            
            $table->foreign('id_veiculo')
                ->references('id')
                ->on('carros');
            
            $table->string('email');
            $table->string('nome');
            $table->string('telefone');
            $table->string('descricao_proposta');
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
        Schema::table('propostas', function (Blueprint $table) {
        });
    }
}
