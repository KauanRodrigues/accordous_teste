<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('imoveis'))
        {
            Schema::create('imoveis', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('fk_proprietario');
                $table->foreign('fk_proprietario')->references('id')->on('proprietarios');
                $table->integer('quartos')->nullable(true);
                $table->integer('andares')->nullable(true);
                $table->integer('banheiros')->nullable(true);
                $table->integer('cozinhas')->nullable(true);
                $table->integer('salas')->nullable(true);
                $table->boolean('garagem')->nullable(true);
                $table->char('cep', 10);
                $table->string('logradouro', 100);
                $table->string('numero', 5)->nullable(true);
                $table->string('bairro', 50);
                $table->string('cidade', 50);
                $table->char('uf', 2);
                $table->string('complemento', 100)->nullable(true);
                $table->boolean('status')->default(0);
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
        Schema::dropIfExists('imoveis');
    }
}
