<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blocos = DB::table('blocos')->get();

        foreach ($blocos as $value) {
            for ($i = 0; $i < 4; $i++) {
                DB::table('apartamentos')->insert([
                    'bloco_id' => $value->codigo,
                    'apto'   => $i + 1 . '01',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                DB::table('apartamentos')->insert([
                    'bloco_id' => $value->codigo,
                    'apto'   => $i + 1 . '02',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                DB::table('apartamentos')->insert([
                    'bloco_id' => $value->codigo,
                    'apto'   => $i + 1 . '03',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                DB::table('apartamentos')->insert([
                    'bloco_id' => $value->codigo,
                    'apto'   => $i + 1 . '04',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
