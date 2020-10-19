<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlugueisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('alugueis'))
        {
            Schema::create('alugueis', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('fk_imovel');
                $table->foreign('fk_imovel')->references('id')->on('imoveis');
                $table->string('nome', 150);
                $table->string('email', 150);
                $table->string('documento', 4);
                $table->string('cpf_cnpj', 18);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alugueis');
    }
}
