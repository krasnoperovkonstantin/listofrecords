<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubgenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++)
            DB::table('Subgenres')->insert([
                'title' => 'Поджанр '.$i,
                'genre_id' => mt_rand(1, 10),
                'slug' => 'subgenre-'.$i,
            ]);
    }
}
