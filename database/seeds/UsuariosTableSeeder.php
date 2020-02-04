<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("usuarios")->insert([
            [
                'name'      => "Sindico",
                'email'     => "sindico@sindico.com",
                'password'  => bcrypt("senha"),
                'cargo'     => 'SINDICO',
                'ativo'     => 1,
            ],
            [
                'name'      => "Porteiro",
                'email'     => "porteiro@porteiro.com",
                'password'  => bcrypt("123456"),
                'cargo'     => 'FUNCIONARIO',
                'ativo'     => 1,
            ]
        ]);
    }
}
