<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('funcionarios'))
        {
            Schema::create('funcionarios', function (Blueprint $table) {
                $table->id();
                $table->string('nome', 150);
                $table->string('email', 150)->unique();
                $table->string('usuario', 50)->unique();
                $table->char('senha', 32);
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
        Schema::dropIfExists('funcionarios');
    }
}
