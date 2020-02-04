<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(BlocosTableSeeder::class);
        $this->call(ApartamentosTableSeeder::class);
        $this->call(InfracoesTableSeeder::class);
        $this->call(UsuariosTableSeeder::class);

    }
}
