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
        DB::table("users")->insert([
            [
                'name'      => "Sindico",
                'cpf'       => "11111111111",
                'telefone'  => "(83)9.9999-9999",
                'email'     => "sindico@sindico.com",
                'password'  => bcrypt("senha"),
                'cargo'     => \App\User::CARGO_SINDICO,
                'ativo'     => 1,
            ],
            [
                'name'      => "Porteiro",
                'cpf'       => "22222222222",
                'telefone'  => "(83)9.5555-5555",
                'email'     => "porteiro@porteiro.com",
                'password'  => bcrypt("123456"),
                'cargo'     => \App\User::CARGO_PORTEIRO,
                'ativo'     => 1,
            ]
        ]);
    }
}
