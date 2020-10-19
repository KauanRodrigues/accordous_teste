<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProprietariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hastable('proprietarios'))
        {
            Schema::create('proprietarios', function (Blueprint $table) {
                $table->id();
                $table->string('nome', 150);
                $table->string('email', 150);
                $table->char('cpf', 14);
                $table->char('cep', 10);
                $table->string('logradouro', 80);
                $table->string('numero', 5);
                $table->string('bairro', 50);
                $table->string('cidade', 50);
                $table->char('uf', 2);
                $table->string('complemento', 150)->nullable(true);
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
        Schema::dropIfExists('proprietarios');
    }
}
