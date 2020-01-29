<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfracoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('infracaos')->insert([
            [
                'created_at' => now(),
                'updated_at' => now(),
                'codigo' => '2.1',
                'descricao' => 'Das Vagas de Estacionamento'
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'codigo' => '2',
                'descricao' => 'Dos Usos das Áreas Comuns'
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'codigo' => '2.2',
                'descricao' => 'Do Playground e Ajardinadas'
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'codigo' => '2.3',
                'descricao' => 'Das Áreas Reservadas e Lixeira'
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'codigo' => '3',
                'descricao' => 'Áreas e Atividades de Recreação'
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'codigo' => '3.1',
                'descricao' => 'Da Piscina'
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'codigo' => '3.2',
                'descricao' => 'Salão de Festa e Churrasqueira'
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'codigo' => '2.3',
                'descricao' => 'Quadra'
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'codigo' => '4',
                'descricao' => 'Deveres do Condomínio'
            ],

        ]);
    }
}
