<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Funcionarios;

class FuncionariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Funcionarios::create([
            'nome' => 'Administrador',
            'email' => 'administrador@gmail.com',
            'usuario' => 'admin',
            'senha' => '21232f297a57a5a743894a0e4a801fc3'
        ]);
    }
}
