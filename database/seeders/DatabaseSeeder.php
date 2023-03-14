<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @throws Exception
     */
    public function run(): void
    {
        DB::table('conversao')->insert([
            'id' => random_int(0,1000),
            'valor_reais' => random_int(0, 999999),
            'valor_dolar' => random_int(0, 999999),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at()' => null
        ]);
    }
}
