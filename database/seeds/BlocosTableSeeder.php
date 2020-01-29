<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlocosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 12; $i++) {
            DB::table('blocos')->insert([
                'codigo' => $i + 1,
                'bloco'  => $i + 1,
            ]);
        }
    }
}
